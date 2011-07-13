<?php

class StartController extends AppController {

    public $uses = array("Carta");

    public function index() {

        $charts = array();
        if ($this->data) {
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
        }
        $this->set("charts", $charts);
    }

}
