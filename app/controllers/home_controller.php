<?php

class HomeController extends AppController {

    /**
     * models usados nesse controller
     * @var array 
     */
    public $uses = array("Carta", "Usuario", "Recorde", "Modo");

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

                $object = $usuario->getByName($this->data["nome"]);

            try {
                if (!$object) {
                    $usuario->persist($this->data, "");
                }
                $_SESSION["name"] = $this->data["nome"];
            } catch (Exception $exc) {}
        }
    }

    /**
     * Ação parabeniza o Usuario
     * @name congratulations
     * @return Void 
     */
    public function highrecords() {
        // seta o layout
        $this->layout = false;
        $modo = new Modo();

        try {
            $this->set("modos", $modo->getAll());
        } catch (Exception $exc) {
            $this->set("modos", $exc->getMessage());
        }
    }

    /**
     * Ação parabeniza o Usuario
     * @name congratulations
     * @return Void 
     */
    public function congratulations($hits, $errors, $time) {

        // seta o layout
        $this->layout = false;

        $usuario = new Usuario();
        $record = new Recorde();

        $object = $usuario->getByName(Session::read("name"));

        $time = str_replace("-", ":", $time);
        $aux = explode(":", $time);
        $points = (($hits * 50) - ($errors * 5) + ($aux[0] * 60 + $aux[1]));

        $this->set("usuario", $object);
        $this->set("hits", $hits);
        $this->set("errors", $errors);
        $this->set("time", $time);
        $this->set("points", $points);

        $record->save(array(
            "usuario_id" => $object["id"],
            "usuario_id" => 1,
            "erros" => $errors,
            "acertos" => $hits,
            "tempos" => $time,
            "pontos" => $points,
        ));
    }

    /**
     * Ação salva o nome do Usuario
     * @name free
     * @return Void 
     */
    public function free() {

        $tema = new Tema();
        try {
            $this->set("temas", $tema->getAll(array("recursion" => -1)));
        } catch (Exception $exc) {
            $this->set("temas", $exc->getMessage());
        }
    }

    public function index() {
        
    }

    public function ranking() {
        // seta o layout
        $this->layout = false;

        $recorde = new Recorde();
        if ($this->data) {

            try {
                $this->set("recordes", $recorde->getAll(array(
                            "conditions" => array("modo_id" => $this->data["id"]),
                            "recursion" => -1
                        )));
            } catch (Exception $exc) {
                $this->set("recordes", $exc->getMessage());
            }
        }
    }

    public function newgame() {
        // seta o layout
        $this->layout = false;
    }

    public function name() {
        // seta o layout
        $this->layout = false;
    }

    public function records() {
        // seta o layout
        $this->layout = false;
    }

    public function instructions() {
        // seta o layout
        $this->layout = false;
    }

}
