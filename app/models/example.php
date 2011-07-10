<?php

/**
 * Description of Example
 * 
 * @name Example
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Example extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "example";
    /**
     * Relacionamento com o Sample Model
     * @var array
     */
    //public $hasMany = array("Sample");

    /**
     * Retorna todos os registros correspondente ao model Example
     * @name getAll
     * @return Example[] 
     */
    public function getAll() {
        // resgata todos os registros
        $examples = $this->all();
        // verifica se há algum registros
        if (count($examples) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum example encontrado");
        }
        // retorno
        return $examples;
    }

    /**
     * Retorna apenas um registro correspondente ao model Example
     * @name get
     * @param int $id Id do example
     * @return Example 
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
        $example = $this->first($options);
        // verifica se há algum registros
        if (count($example) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum example encontrado");
        }
        // retorno
        return $example;
    }

    /**
     * Apagar apenas um registro correspondente ao model Example
     * @name delete
     * @param int $id Id do example
     * @return Example 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar example");
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
