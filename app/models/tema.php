<?php

/**
 * Description of Tema
 * 
 * @name Tema
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Tema extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "tema";
    /**
     * Relacionamento com o Carta Model
     * @var array
     */
    public $hasMany = array("Carta");

    /**
     * Retorna todos os registros correspondente ao model Tema
     * @name getAll
     * @return Tema[] 
     */
    public function getAll(array $options = array()) {
        // resgata todos os registros
        $temas = $this->all($options);
        // verifica se há algum registros
        if (count($temas) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhumz tema encontrado");
        }
        // retorno
        return $temas;
    }

    /**
     * Retorna apenas um registro correspondente ao model Tema
     * @name get
     * @param int $id Id do tema
     * @return Tema 
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
        $tema = $this->first($options);
        // verifica se há algum registros
        if (count($tema) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum tema encontrado");
        }
        // retorno
        return $tema;
    }

    /**
     * Apagar apenas um registro correspondente ao model Tema
     * @name delete
     * @param int $id Id do tema
     * @return Tema 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar tema");
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
