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

}
