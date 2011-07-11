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
     * Retorna todos os registros correspondente ao model Usuario
     * @name getAll
     * @return Usuario[]
     */
    public function getAll() {
        // resgata todos os registros
        $usuarios = $this->all(array(
                    "order" => "nome ASC",
                ));
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

