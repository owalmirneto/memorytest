<?php

/**
 * Description of Usuario
 *
 * @name Usuario
 * @package models
 *
 * @author wfsneto <wfsneto@gmail.com>
 * @copyright Pianolab <http://www.pianolab.com.br>
 */
class Usuario extends AppModel {

    /**
     * Nome da tabela
     * @var string
     */
    public $table = "usuario";
    /**
     * Relacionamento com o Tema Model
     * @var array
     */
    public $belongsTo = array("Tema");
    /**
     * Relacionamento com o Jogosalvo Model
     * @var array
     */
    public $hasMany = array("Jogosalvo");

    /**
     * Retorna retorna os pontos adiquirido na partida 
     * @name getPoints
     * @return array
     */
    public function getPoints(array $params = array()) {
        // extrai os indices do array 
        extract($params);

        // tratando a variavel de tempo 
        $time = str_replace("-", ":", $time);
        $aux = explode(":", $time);
        // calculando os pontos
        $points = (($hits * 50) - ($errors * 20) + ($aux[0] * 60 + $aux[1]));
        // setando as variaveis necessarias para a view 
        return  $points;
    }

    /**
     * Retorna todos os registros correspondente ao model Usuario
     * @name getAll
     * @return Usuario[]
     */
    public function getAll(array $options = array()) {
        // resgata todos os registros
        $usuarios = $this->all($options);
        // verifica se há algum registros
        if (count($usuarios) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum Usuario Encontrado");
        }
        // retorno
        return $usuarios;
    }

    /**
     * Retorna apenas um registro correspondente ao model Usuario
     * @name get
     * @param int $id Id do usuario
     * @return Usuario
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
        $usuario = $this->first($options);
        // verifica se há algum registros
        if (count($usuario) == 0) {
            // caso não tenha levanta excessão
            throw new Exception("Nenhum Usuario Encontrado");
        }
        // retorno
        return $usuario;
    }

    /**
     * Retorna apenas um registro correspondente ao model Usuario
     * @name getByName
     * @param int $name Id do usuario
     * @return Usuario
     */
    public function getByName($name) {
        // array de opções como condição, limite, ordem. etc...
        $options = array(
            // referente as condições
            "conditions" => array(
                "nome" => $name
            ),
            // referente a limite
            "limit" => "1",
        );
        // resgata o registro
        $usuario = $this->first($options);
        // verifica se há algum registros
        if (count($usuario) == 0) {
            // caso não tenha levanta excessão
            return false;
        }
        // retorno
        return $usuario;
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

