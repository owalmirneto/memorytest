<?php

class StartController extends AppController {

    public $uses = array("Carta");

    public function campaign($level) {

        $levels = array();

        $jogador = Session::read("Usuario");

        foreach ($jogador["jogosalvo"] as $jogo) {
            $levels[] = $jogo["nivel"];
        }

        if (!in_array($level, $levels) && $level > (count($levels) + 1)) {
            $this->redirect("/home/campaign");
        }

        $charts = array();
        $carta = new Carta();
        $charts = $carta->getAll(array(
                    "order" => "RAND()",
                    "limit" => "1, " . ($level * 2)
                ));
        $charts = array_merge($charts, $charts);

        shuffle($charts);

        $this->set("charts", $charts);
    }

    public function index() {

        $charts = array();
        if (!$this->data) {
            $this->redirect("/home/free");
        } else {
            $carta = new Carta();
            $charts = $carta->getAll(array(
                        "conditions" => array(
                            "tema_id" => $this->data["theme"]
                        ),
                        "order" => "RAND()",
                        "limit" => "1,{$this->data["level"]}"
                    ));
            $charts = array_merge($charts, $charts);

            shuffle($charts);
            $this->set("charts", $charts);
        }
    }

}
