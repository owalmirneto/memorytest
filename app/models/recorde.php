<?php

/**
 * Description of Recorde
 * 
 * @name Recorde
 * @package models
 * 
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Recorde extends AppModel {

    /**
     * Nome da tabela
     * @var string 
     */
    public $table = "recorde";
    
    /**
     * Relacionamento com o Tema, Modo Model
     * @var array
     */
    public $belongsTo = array("Usuario", "Modo");

    /**
     * Retorna todos os registros correspondente ao model Recorde
     * @name getAll
     * @return Recorde[] 
     */
    public function getAll(array $options = array()) {
        // resgata todos os registros
        $recordes = $this->all($options);
        // verifica se há algum registros
        if (count($recordes) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum recorde encontrado");
        }
        // retorno
        return $recordes;
    }

    /**
     * Retorna apenas um registro correspondente ao model Recorde
     * @name get
     * @param int $id Id do recorde
     * @return Recorde 
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
        $recorde = $this->first($options);
        // verifica se há algum registros
        if (count($recorde) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum recorde encontrado");
        }
        // retorno
        return $recorde;
    }

    /**
     * Apagar apenas um registro correspondente ao model Recorde
     * @name delete
     * @param int $id Id do recorde
     * @return Recorde 
     */
    public function _delete($id) {
        // executa
        if (!$this->delete($id)) {
            throw new Exception("Não possível apagar recorde");
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
