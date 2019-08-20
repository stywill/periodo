<?php

namespace classes;

/**
 * Description of Conexao
 *
 * @author Wilson Oliveira
 */
class Conexao {

    public static function pegaConexao() {
        $conexao = new \PDO('mysql:host=127.0.0.1;dbname=estoque', 'root', '');
        return $conexao;
    }

}
