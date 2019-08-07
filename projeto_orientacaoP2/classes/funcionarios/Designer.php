<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\funcionarios;

use classes\abstratas\Funcionario;

/**
 * Description of Designer
 *
 * @author Wilson Oliveira
 */
class Designer extends Funcionario {

    public function getBonificacao() {
        return $this->salario * 0.3;
    }

}
