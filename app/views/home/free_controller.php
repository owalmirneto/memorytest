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
    public function congratulations($hits, $errors, $time) {
        // seta o layout
        $this->layout = false;
        // instancia dos models usados
        $usuario = new Usuario();
        $record = new Recorde();
        // usuario da vez 
        $jogador = Session::read("Usuario");
        $object = $usuario->getByName($jogador["nome"]);
        // tratando a variavel de tempo 
        $time = str_replace("-", ":", $time);
        $aux = explode(":", $time);
        // calculando os pontos
        $points = (($hits * 50) - ($errors * 5) + ($aux[0] * 60 + $aux[1]));
        // setando as variaveis necessarias para a view
        $this->set("usuario", $object);
        $this->set("hits", $hits);
        $this->set("errors", $errors);
        $this->set("time", $time);
        $this->set("points", $points);
        //verifica se há post
        if ($_POST) {
            // salva o recorde do jogador 
            $record->save(array(
                "usuario_id" => $object["id"],
                "modo_id" => 1,
                "erros" => $_POST["errors"],
                "acertos" => $_POST["hits"],
                "tempos" => str_replace("-", ":", $_POST["time"]),
                "pontos" => $points,
            ));
        }
    }

}
