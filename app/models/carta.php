<?php

/**
 * Description of Carta
 * 
 * @name Carta
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Carta extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "carta";
    /**
     * Relacionamento com o Tema Model
     * @var array
     */
    public $belongsTo = array("Tema");

    /**
     * Retorna todos os registros correspondente ao model Carta
     * @name getAll
     * @return Carta[] 
     */
    public function getAll(array $options = array()) {
        // resgata todos os registros
        $cartas = $this->all($options);
        // verifica se há algum registros
        if (count($cartas) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum carta encontrado");
        }
        // retorno
        return $cartas;
    }

    /**
     * Retorna apenas um registro correspondente ao model Carta
     * @name get
     * @param int $id Id do carta
     * @return Carta 
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
        $carta = $this->first($options);
        // verifica se há algum registros
        if (count($carta) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum carta encontrado");
        }
        // retorno
        return $carta;
    }

    /**
     * Apagar apenas um registro correspondente ao model Carta
     * @name delete
     * @param int $id Id do carta
     * @return Carta 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar carta");
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
