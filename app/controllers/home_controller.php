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
     * Ação mostra como jogar
     * @name tutorial
     * @return Void 
     */
    public function tutorial() {
        // instancia do Model carta
        $carta = new Carta();
        // retorna as cartas (embaralhadas) necessaria para o jogo
        $charts = $carta->getAll(array(
                    "order" => "RAND()",
                    "limit" => "1,2"
                ));
        // duplica as carta
        $charts = array_merge($charts, $charts);
        // setando as cartas para a view
        $this->set("charts", $charts);
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
     * Ação troca o tema 
     * @name theme
     * @return Void 
     */
    public function theme() {
        // seta o layout
        $this->layout = false;
        // verifica se há post
        if ($this->data) {
            $usuario = new Usuario();
            $this->data["id"] = $_SESSION["Usuario"]["id"];
            $usuario->save($this->data);
            $jogador = $usuario->all(array(
                        "conditions" => array(
                            "id" => $_SESSION["Usuario"]["id"],
                        )));
            Session::write("Usuario", $jogador[0]);
        }
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
    public function credits() {
        // seta o layout
        $this->layout = false;
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

    public function newmemory() {
        // seta o layout
        $this->layout = false;
        // instancia de Modo 
        $modo = new Modo();
        try {
            $this->set("modos", $modo->getAll());
        } catch (Exception $exc) {
            $this->set("modos", "Nenhum jogador encontrado");
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

        if ($this->data) {
            try {
                $object = $usuario->getByName($this->data["nome"]);
                
                $_SESSION["Usuario"] = $object;
            } catch (Exception $exc) {
                
            }
        }
    }

}
