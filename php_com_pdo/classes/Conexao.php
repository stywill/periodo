<?php

namespace classes;
use classes\config;
/**
 * Description of Conexao
 *
 * @author Wilson Oliveira
 */
class Conexao {

    public static function pegaConexao() {
        $conexao = new \PDO(DB_DRIVE.":host=".DB_HOSTNAME.";dbname=".DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        return $conexao;
    }

}
