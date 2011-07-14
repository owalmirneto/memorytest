<?php

/**
 * Description of Modo
 * 
 * @name Modo
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Modo extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "modo";

    /**
     * Retorna todos os registros correspondente ao model Modo
     * @name getAll
     * @return Modo[] 
     */
    public function getAll(array $options = array()) {
        // resgata todos os registros
        $modos = $this->all();
        // verifica se há algum registros
        if (count($modos) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum modo encontrado");
        }
        // retorno
        return $modos;
    }

    /**
     * Retorna apenas um registro correspondente ao model Modo
     * @name get
     * @param int $id Id do modo
     * @return Modo 
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
        $modo = $this->first($options);
        // verifica se há algum registros
        if (count($modo) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum modo encontrado");
        }
        // retorno
        return $modo;
    }

    /**
     * Apagar apenas um registro correspondente ao model Modo
     * @name delete
     * @param int $id Id do modo
     * @return Modo 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar modo");
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
