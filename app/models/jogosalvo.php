<?php

/**
 * Description of Jogosalvo
 * 
 * @name Jogosalvo
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Jogosalvo extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "jogosalvo";

    /**
     * Retorna todos os registros correspondente ao model Jogosalvo
     * @name getAll
     * @return Jogosalvo[] 
     */
    public function getAll(array $options = array()) {
        // resgata todos os registros
        $jogosalvos = $this->all($options);
        // verifica se há algum registros
        if (count($jogosalvos) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhumz jogosalvo encontrado");
        }
        // retorno
        return $jogosalvos;
    }

    /**
     * Retorna apenas um registro correspondente ao model Jogosalvo
     * @name get
     * @param int $id Id do jogosalvo
     * @return Jogosalvo 
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
        $jogosalvo = $this->first($options);
        // verifica se há algum registros
        if (count($jogosalvo) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum jogosalvo encontrado");
        }
        // retorno
        return $jogosalvo;
    }

    /**
     * Apagar apenas um registro correspondente ao model Jogosalvo
     * @name delete
     * @param int $id Id do jogosalvo
     * @return Jogosalvo 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar jogosalvo");
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
