<?php

class FreeController extends AppController {

    /**
     * models usados nesse controller
     * @var array 
     */
    public $uses = array("Tema", "Usuario", "Recorde",);

    /**
     * Ação default 
     * @name index
     * @return Void 
     */
    public function index() {
        // instancia do model Tema 
        $tema = new Tema();
        try {
            // retorna todos os temas
            $this->set("temas", $tema->getAll(array("recursion" => -1)));
        } catch (Exception $exc) {
            $this->set("temas", $exc->getMessage());
        }
    }

    /**
     * Ação onde o jogo acontece 
     * @name start
     * @return Void  
     */
    public function start() {
        // inicializacao do array
        $charts = array();
        // verifica se há post
        if (!$this->data) {
            // redireciona caso não haja post
            $this->redirect("/home/free");
        } else {
            // instancia do Model carta
            $carta = new Carta();
            // retorna as cartas (embaralhadas) necessaria para o jogo
            $charts = $carta->getAll(array(
                        "conditions" => array(
                            "tema_id" => $this->data["theme"]
                        ),
                        "order" => "RAND()",
                        "limit" => "1,{$this->data["level"]}"
                    ));
            // duplica as carta
            $charts = array_merge($charts, $charts);
            // reembalha a posição das cartas
            shuffle($charts);
            // setando as cartas para a view
            $this->set("charts", $charts);
        }
    }

    /**
     * Ação onde o jogo acontece 
     * @name configurable
     * @return Void  
     */
    public function configurable() {
        // inicializacao do array
        $charts = array();
        // verifica se há post
        if (!$this->data) {
            // redireciona caso não haja post
            $this->redirect("/home/configurable");
        } else {
            // instancia do Model carta
            $carta = new Carta();
            // retorna as cartas (embaralhadas) necessaria para o jogo
            $charts = $carta->getAll(array(
                        "order" => "RAND()",
                        "limit" => "1,{$this->data["level"]}"
                    ));
            // duplica as carta
            $charts = array_merge($charts, $charts);
            // reembalha a posição das cartas
            shuffle($charts);
            // setando as cartas para a view
            $this->set("charts", $charts);
        }
    }

    /**
     * Ação parabeniza o Usuario
     * @name congratulations
     * @param type $hits Quantidades de acertos
     * @param type $errors Quantidades de erros
     * @param type $time Tempo gasto
     * @return Void 
     */
    public function congratulations($hits, $errors, $time, $modo) {
        // seta o layout
        $this->layout = false;
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
        // pasando dados para o template
        $_SESSION["data"] = array(
            "hits" => $hits,
            "errors" => $errors,
            "time" => str_replace("-", ":", $time),
            "points" => $points,
            "congratulations" => "Parabéns",
            "href" => Mapper::base() . "/",
            "link" => "Jogar novamente",
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
            Session::write("Usuario", $usuario->getByName($jogador["nome"]));
        }
    }

}
