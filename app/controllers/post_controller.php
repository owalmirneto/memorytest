<?php

/**
 * Description of PostController
 * 
 * @name PostController
 * @package controllers
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class PostController extends AppController {

    /**
     * Ação default refente ao controller Post
     * @name index
     * @return Void 
     */
    public function index() {
        // instancia do model Post
        $post = new Post();
        try {
            // buscandos todos os registros e passando para a view
            $this->set("posts", $post->getAll());
        } catch (Exception $exc) {
            $this->set("posts", $exc->getMessage());
        }
    }

    /**
     * Ação de adição de resgistro refente ao controller Post
     * @name add
     * @return Void 
     */
    public function add() {
        // instancia do model Post
        $post = new Post();
        // usuario da vez 
        $usuario = Session::read("Usuario");
        try {
            // verifica se há $_POST
            if (!empty($this->data)) {
                
                $this->data["usuario_id"] = $usuario["id"];
                // persiste ou levanta a excessão
                $post->persist($this->data, "Não foi possivel adicionar Post");
                // mensagem de sucesso
                $_SESSION["ok"] = "Post adicionado com sucesso";
                // redireciona para a pagina inicial do controller Post
                $this->redirect("/post");
            }
        } catch (Exception $exc) {
            // mensagem de erro
            $_SESSION["erro"] = $exc->getMessage();
        }
    }

}
