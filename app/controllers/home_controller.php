<?php

class HomeController extends AppController {

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
        
    }

    /**
     * Ação salva o nome do Usuario
     * @name name
     * @return Void 
     */
    public function name() {
        // seta o layout
        $this->layout = false;
    }

    /**
     * Ação salva o nome do Usuario
     * @name savename
     * @return Void 
     */
    public function savename() {
        // seta o layout
        $this->layout = false;
        //  retorna o model
        $usuario = ClassRegistry::load('Usuario', 'Model');

        if ($this->data["nome"] != "") {

            $this->data["tema_id"] = 1;
            $this->data["ip_rede"] = $_SERVER["REMOTE_ADDR"];

            $object = $usuario->getByName($this->data["nome"]);

            try {
                if (!$object) {
                    $usuario->persist($this->data, "");
                }
                $object = $usuario->getByName($this->data["nome"]);
                $_SESSION["Usuario"] = $object;
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
    }

    /**
     * Ação parabeniza o Usuario
     * @name campaign
     * @return Void 
     */
    public function campaign() {
        $this->set("base", Mapper::base());

        $this->set("current", 1);
        $usuario = Session::read('Usuario');
        if (!$usuario) {
            $this->set("jogosalvo", array());
        } else {
            $this->set("jogosalvo", $usuario["jogosalvo"]);
        }
    }

    /**
     * Ação parabeniza o Usuario
     * @name highrecords
     * @return Void 
     */
    public function highrecords() {
        // seta o layout
        $this->layout = false;
        // instancia de Modo 
        $modo = new Modo();
        try {
            $this->set("modos", $modo->getAll());
        } catch (Exception $exc) {
            $this->set("modos", $exc->getMessage());
        }
    }

    public function ranking() {
        // seta o layout
        $this->layout = false;

        $recorde = new Recorde();
        if ($this->data) {

            try {
                $this->set("recordes", $recorde->getAll(array(
                            "conditions" => array("modo_id" => $this->data["modo_id"]),
                            "order" => "pontos DESC, acertos DESC, erros DESC",
                        )));
            } catch (Exception $exc) {
                $this->set("recordes", $exc->getMessage());
            }
        }
    }

    public function newgame() {
        // seta o layout
        $this->layout = false;
        // instancia de Modo 
        $modo = new Modo();
        try {
            $this->set("modos", $modo->getAll());
        } catch (Exception $exc) {
            $this->set("modos", $exc->getMessage());
        }
    }

    public function player() {
        // seta o layout
        $this->layout = false;
        // instancia de usuario 
        $usuario = new Usuario();
        try {
            $this->set("usuarios", $usuario->getAll(array(
                        "conditions" => array("ip_rede" => $_SERVER["REMOTE_ADDR"]),
                        "order" => "nome ASC",
                    )));
        } catch (Exception $exc) {
            $this->set("usuarios", $exc->getMessage());
        }
        //  retorna o model
        $usuario = ClassRegistry::load('Usuario', 'Model');

        if ($this->data) {
            try {
                $object = $usuario->getByName($this->data["nome"]);
                $_SESSION["Usuario"] = $object;
            } catch (Exception $exc) {
                
            }
        }
    }

}
