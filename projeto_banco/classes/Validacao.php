<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace classes;
/**
 * Description of Validacao
 *
 * @author Wilson Oliveira
 */
class Validacao {
    public static function protegeAtributo($atributo){

        if($atributo == "titular" || $atributo == "saldo"){

            throw new \Exception("O atributo $atributo continua privado ");

        }
    }
    public static function verificaNumerico($valor){
        if(!is_numeric($valor)) {
            throw new \InvalidArgumentException("Esse não é um valor valido ($valor)");
        }
         if($valor < 0){
            throw new \Exception("O valor não pode ser negativo");
        }
    }
    
}
