<?php

/**
 * Description of Post
 * 
 * @name Post
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Post extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "post";
    /**
     * Relacionamento com o Usuario Model
     * @var array
     */
    public $belongsTo = array("Usuario");

    /**
     * Retorna todos os registros correspondente ao model Post
     * @name getAll
     * @return Post[] 
     */
    public function getAll() {
        // resgata todos os registros
        $posts = $this->all(array("order" => "data DESC",));
        // verifica se há algum registros
        if (count($posts) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum Post Encontrado");
        }
        // retorno
        return $posts;
    }

    /**
     * Retorna apenas um registro correspondente ao model Post
     * @name get
     * @param int $id Id do post
     * @return Post 
     */
    public function get($id) {
        // array de opções como condição, limite, ordem. etc...
        $options = array(
            // referente as condições
            "conditions" => array(
                "id" => round($id)
            ),
            // referente a limite
            "limit" => "1",
        );
        // resgata o registro
        $post = $this->first($options);
        // verifica se há algum registros
        if (count($post) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum Post Encontrado");
        }
        // retorno
        return $post;
    }

    /**
     * Apagar apenas um registro correspondente ao model Post
     * @name delete
     * @param int $id Id do post
     * @return Post 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar Post");
        }
        // retorno
        return true;
    }

    /**
     * Persiti os dados na base de dados ao inserir ou atualizar um registro.
     * @name persist
     * @param array $data Dados a serem persistidos na base de dados.
     * @param string $exeption Mensagem da Excessão.
     * @return Boolean 
     */
    public function persist($data, $exeption) {
        // executar o comando de persistencia
        $return = $this->save($data);
        // verifica se realmente foi inserido
        if (!$return) {
            // caso não tenha levanta excessão
            throw new Exception($exeption);
        }
        // retorno
        return true;
    }

}
