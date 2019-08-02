<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionario
 *
 * @author Wilson Oliveira
 */

namespace classes\abstratas;

/* Classes abstratas não podem ser estanciadas */

abstract class Funcionario {

    public $nome;
    public $cpf;
    protected $salario;
    protected static $piso = 1056.00;

    public function __construct($cpf=NULL,$salario=NULL) {
        //return func_num_args();
        if (func_num_args() == 2) {
            $this->cpf = $cpf;
            $this->salario = $salario;
        } else {
            $this->construct2($cpf);
        }
    }

    public function construct2($cpf) {
        $this->cpf = $cpf;
        $this->salario = self::$piso;
    }

//para tornar um metodo obrigatorio nas classes filhas ele deve ser abstrato.
    abstract public function getBonificacao();

    final public function aumentarSalario() {
        $this->salario *= 1.3;
    }
    public static function setPiso($valor) {
        self::$piso = $valor;
    }
}
