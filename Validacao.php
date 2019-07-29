<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validacao
 *
 * @author Wilson Oliveira
 */
class Validacao {
    public static function protegeAtributo($atributo){

        if($atributo == "titular" || $atributo == "saldo"){

            throw new Exception("O atributo $atributo continua privado ");

        }
    }
    public static function verificaNumerico($valor){

        if(!is_numeric($valor)) {

            throw new Exception("Esse não é um valor valido ($valor)");

        }
    }
    
}
