<?php

class CampaignController extends AppController {

    /**
     * models usados nesse controller
     * @var array 
     */
    public $uses = array("Carta", "Usuario", "Recorde", "Modo");

    /**
     * Ação default 
     * @name index
     * @return Void 
     */
    public function index() {

        $this->set("base", Mapper::base());

        $this->set("current", 1);
        $usuario = Session::read('Usuario');
        
        if (!$usuario) {
            $this->set("jogosalvo", array());
        } else {
            $this->set("jogosalvo", $usuario["jogosalvo"]);
        }
    }

    public function start($level) {
        // inicializando variaveis
        $levels = array();
        $charts = array();
        // jogador online
        $jogador = Session::read("Usuario");
        // verifica quais niveis foram jogados 
        foreach ($jogador["jogosalvo"] as $jogo) {
            $levels[] = $jogo["nivel"];
        }
        // redirecionamento caso usuario não tenha acessado este link
        if ((!in_array($level, $levels) && $level > (count($levels) + 1)) || $level > 6) {
            $this->redirect("/campaign");
        }
        // instancia do model carta
        $carta = new Carta();
        // retorna as cartas (embaralhadas) necessaria para o jogo
        $charts = $carta->getAll(array(
                    "order" => "RAND()",
                    "limit" => "1, " . ($level * 3)
                ));
        // duplica as carta
        $charts = array_merge($charts, $charts);
        // reembalha a posição das cartas
        shuffle($charts);
        // setando cartas e variaveis para a view
        $this->set("charts", $charts);
        $this->set("level", $level);
    }

    /**
     * Ação parabeniza o Usuario
     * @name congratulations
     * @param type $hits Quantidades de acertos
     * @param type $errors Quantidades de erros
     * @param type $time Tempo gasto
     * @return Void 
     */
    public function congratulations($level, $hits, $errors, $time) {
        // seta o layout
        $this->layout = false;
        // instancia dos models usados
        $usuario = new Usuario();
        $record = new Recorde();
        $jogosalvo = new Jogosalvo();
        // usuario da vez 
        $jogador = Session::read("Usuario");
        // tratando a variavel de tempo 
        $time = str_replace("-", ":", $time);
        $aux = explode(":", $time);
        // calculando os pontos
        $points = (($hits * 50) - ($errors * 5) + ($aux[0] * 60 + $aux[1]));
        // setando as variaveis necessarias para a view
        $this->set("hits", $hits);
        $this->set("errors", $errors);
        $this->set("time", $time);
        $this->set("points", $points);
        $this->set("level", $level);
        //verifica se há post
        if ($_POST) {
            // salva o recorde do jogador 
            $record->save(array(
                "usuario_id" => $jogador["id"],
                "modo_id" => 2,
                "erros" => $_POST["errors"],
                "acertos" => $_POST["hits"],
                "tempos" => str_replace("-", ":", $_POST["time"]),
                "pontos" => $points,
            ));
            // montando array a ser salvo 
            $jogo = $jogosalvo->all(array(
                        "conditions" => array(
                            "usuario_id" => $jogador["id"],
                            "nivel" => $level,
                        )));
        
            $jogo["usuario_id"] = $jogador["id"];
            $jogo["nivel"] = $level;
            // guarda o nivel desse jogador
            $jogosalvo->save($jogo);
            
            $jogador = $usuario->all(array(
                        "conditions" => array(
                            "id" => $jogador["id"],
                        )));
            Session::write("Usuario", $jogador[0]);
            
            // setando as variaveis necessarias para a view
            $this->set("usuario", $jogador[0]);
        }
        // resgata o usuario depois de salvo
    }

}
