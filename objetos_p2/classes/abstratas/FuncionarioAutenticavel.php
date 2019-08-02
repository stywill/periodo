<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\abstratas;

use classes\abstratas\Funcionario;

/**
 * Description of FuncionarioAutenticavel
 *
 * @author Wilson Oliveira
 */
abstract class FuncionarioAutenticavel extends Funcionario {

    public $senha;

    public function autenticar($senha) {
        return ($senha == $this->senha) ? true : false;
    }

    
}
