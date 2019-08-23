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
        $conexao = new \PDO(DB_DRIVE.":host=".DB_HOSTNAME.";dbname=".DB_DATABASE.";charset=".DB_CHARSET, DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }

}
