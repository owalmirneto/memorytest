<?php

class HomeController extends AppController {

    public $uses = array();

    public function index() {
        
    }

    public function prealphabeta() {
        // Each sponsor is an element of the $charts array:
        $charts = array(
            array("id" => 1, "img" => "mysql",),
            array("id" => 2, "img" => "hp",),
            array("id" => 3, "img" => "microsoft",),
            array("id" => 4, "img" => "dell",),
            array("id" => 5, "img" => "ebay",),
            array("id" => 6, "img" => "digg",),
            array("id" => 7, "img" => "google",),
            array("id" => 8, "img" => "ea",),
            array("id" => 9, "img" => "cisco",),
            array("id" => 10, "img" => "vimeo",),
            array("id" => 11, "img" => "canon",),
            array("id" => 12, "img" => "facebook",),
        );
        $charts = array_merge($charts, $charts);
        // Randomizing the order of sponsors:
        shuffle($charts);
        
        $this->set("charts", $charts);
    }

}

?>