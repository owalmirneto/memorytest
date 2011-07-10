<?php

/**
 * Description of ExampleController
 * 
 * @name ExampleController
 * @package controllers
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class ExampleController extends AppController {

    /**
     * Ação default refente ao controller Example
     * @name index
     * @return Void 
     */
    public function index() {
        // instancia do model Example
        $example = new Example();
        // buscandos todos os registros e passando para a view
        $this->set("examples", $example->getAll());
    }

    /**
     * Ação de adição de resgistro refente ao controller Example
     * @name add
     * @return Void 
     */
    public function add() {
        // instancia do model Example
        $example = new Example();
        try {
            // verifica se há $_POST
            if (!empty($this->data)) {
                // persiste ou levanta a excessão
                $example->persist($this->data, "Não foi possivel adicionar Example");
                // mensagem de sucesso
                $_SESSION["ok"] = "Example adicionado com sucesso";
            }
        } catch (Exception $exc) {
            // mensagem de erro
            $_SESSION["erro"] = $exc->getMessage();
        }
    }

    /**
     * Ação de edição de um registro refente ao controller Example
     * @name edit
     * @param int $id Id do example
     * @return Void 
     */
    public function edit($id) {
        // instancia do model Example
        $example = new Example();
        try {
            // verifica se há $_POST
            if (!empty($this->data)) {
                // persiste ou levanta a excessão
                $example->persist($this->data, "Não foi possivel editar Example");
                // mensagem de sucesso
                $_SESSION["ok"] = "Example editado com sucesso";
                // redireciona para a pagina inicial do controller Example
                $this->redirect(BASE_URL . "/example");
            }
            // buscandos o registro e passando para a view
            $this->set("example", $example->get($id));
        } catch (Exception $exc) {
            // mensagem de erro
            $_SESSION["erro"] = $exc->getMessage();
        }
    }

    /**
     * Ação de detalhamento do registro refente ao controller Example
     * @name view
     * @return Void 
     */
    public function view($id) {
        // instancia do model Example
        $example = new Example();
        try {
            // buscandos todos os registros e passando para a view
            $this->set("example", $example->get($id));
        } catch (Exception $exc) {
            // mensagem de erro
            $_SESSION["erro"] = $exc->getMessage();
            // redireciona para a pagina inicial do controller Example
            $this->redirect(BASE_URL . "/example");
        }
    }

    /**
     * Ação de deletar um registro correspondente ao model Example
     * @name delete
     * @param int $id Id do example
     * @return Void 
     */
    public function delete($id) {
        // instancia do model Example
        $example = new Example();
        try {
            // verifica se há $_POST
            if (!empty($this->data)) {
                // executa a ação de apagar
                $example->_delete($id);
                // mensagem de sucesso
                $_SESSION["ok"] = "Example apagado com sucesso";
                // redireciona para a pagina inicial do controller Example
                $this->redirect(BASE_URL . "/example");
            }
            // buscandos o registro e passando para a view
            $this->set("example", $example->get($id));
        } catch (Exception $exc) {
            // mensagem de erro
            $_SESSION["erro"] = $exc->getMessage();
        }
    }

}
