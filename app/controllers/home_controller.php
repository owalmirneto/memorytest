<?php

class HomeController extends AppController {

    public $uses = array("Usuario");

    public function index() {
        
    }

    public function config() {
        $this->layout = false;
    }

    public function name() {
        $this->layout = false;
    }

    public function savename() {

        $this->layout = false;

        if ($this->data["nome"] != "") {
            try {
                $usuario = ClassRegistry::load('Usuario', 'Model');
                $usuario->persist($this->data, "");

                $_SESSION["name"] = $this->data["nome"];
            } catch (Exception $exc) {
                
            }
        }
    }

    public function records() {
        $this->layout = false;
    }

    public function instructions() {
        $this->layout = false;
    }

    public function congratulations($hits, $errors, $time) {
        $this->layout = false;
        
        $this->set("hits", $hits);
        $this->set("errors", $errors);
        $this->set("time", $time);
    }

    public function livre() {
        // Each sponsor is an element of the $charts array:
        $charts = array(
            array("id" => 1, "img" => "mysql",),
            array("id" => 2, "img" => "hp",),
            array("id" => 3, "img" => "microsoft",),
            array("id" => 4, "img" => "dell",),
            array("id" => 5, "img" => "ebay",),
            array("id" => 6, "img" => "digg",),
            array("id" => 7, "img" => "google",),
                /*
                  array("id" => 8, "img" => "ea",),
                  array("id" => 9, "img" => "cisco",),
                  array("id" => 10, "img" => "vimeo",),
                  array("id" => 11, "img" => "canon",),
                  array("id" => 12, "img" => "facebook",),
                  array("id" => 13, "img" => "sony",),
                  array("id" => 14, "img" => "yahoo",),
                 */
        );

        $charts = array_merge($charts, $charts);
        // Randomizing the order of sponsors:
        shuffle($charts);

        $this->set("charts", $charts);
    }

}
