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
        $levels = $jogosalvo = array();

        $this->set("base", Mapper::base());

        $this->set("current", 1);
        $jogador = Session::read('Usuario');
        
        foreach ($jogador["jogosalvo"] as $jogo) {
            if (!in_array($jogo["nivel"], $levels)) {
                $levels[] = $jogo["nivel"];
                $jogosalvo[] = $jogo;
            }
        }
        
        if (!$jogador) {
            $this->set("jogosalvo", array());
        } else {
            $this->set("jogosalvo", $jogosalvo);
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
            if (!in_array($jogo["nivel"], $levels)) {
                $levels[] = $jogo["nivel"];
            }
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
    public function congratulations($level, $hits, $errors, $time, $modo) {
        // seta o layout
        $this->layout = false;
        // baseUrl
        $base = Mapper::base();
        // instancia dos model usudario
        $usuario = new Usuario();
        // resgatando o usuario da vez 
        $jogador = Session::read("Usuario");
        // retorna o pontos da partida 
        $points = $usuario->getPoints(array(
            "hits" => $hits,
            "errors" => $errors,
            "time" => $time
        ));
        if ($level >= 6) {
            $href = "$base/campaign";
            $congratulations = "Parabéns, Fim de jogo";
            $link = "Parabéns!";
        } else {
            $href = "$base/campaign/start/" . ($level+1);
            $congratulations = "Parabéns!";
            $link = "Next level";
        }
        // pasando dados para o template
        $_SESSION["data"] = array(
            "hits" => $hits,
            "errors" => $errors,
            "time" => str_replace("-", ":", $time),
            "points" => $points,
            "congratulations" => $congratulations,
            "href" => $href,
            "link" => $link,
        );
        //verifica se há post
        if ($_POST) {
            // instacia do model Recorde 
            $record = new Recorde();
            // salva o recorde do jogador 
            $record->save(array(
                "usuario_id" => $jogador["id"],
                "modo_id" => $modo,
                "erros" => $_POST["errors"],
                "acertos" => $_POST["hits"],
                "tempos" => str_replace("-", ":", $_POST["time"]),
                "pontos" => $points,
            ));
            
            $jogosalvo = new Jogosalvo();
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
            
            // resgata o usuario depois de salvo
            Session::write("Usuario", $usuario->getByName($jogador["nome"]));
        }
    }

}
