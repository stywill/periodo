<?php

declare (strict_types = 1);
/**
 * Description of ArrayUtils
 *
 * @author Wilson Oliveira
 */

namespace Classes;

class ArrayUtils {

    // O "&" faz que não seja criada uma cópia dele para trabalhar dentro do escopa dessa função
    public static function remover($emento, &$array) {
        $posicao = array_search($emento, $array);
        if (is_int($posicao)) {
            unset($array[$posicao]);
        } else {
            echo "<p><h2>Não foi encontrado no Array</h2></p>";
        }
    }

    public static function encontrarPessoasComSaldoMaior(int $saldo, array $array):array {
        $correntistasComSaldoMaior = array();
        foreach ($array as $chave => $valor) {
            if ($valor > $saldo) {
                $correntistasComSaldoMaior[] = $chave;
            }
        }
        return $correntistasComSaldoMaior;
    }

}
