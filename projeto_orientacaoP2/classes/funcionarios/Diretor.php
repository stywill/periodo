<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Diretor
 *
 * @author Wilson Oliveira
 */

namespace classes\funcionarios;

use classes\abstratas\Funcionario;
use classes\abstratas\FuncionarioAutenticavel;

class Diretor extends FuncionarioAutenticavel {
    //esse metodo se torna obrigatório porque esta definido como abstrato na classe Funcionario
    public function getBonificacao() {
        return $this->salario * 0.5;
    }

}
