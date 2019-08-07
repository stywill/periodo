<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\interfaces;
use classes\abstratas\FuncionarioAutenticavel;
/**
 * Description of Autenticavel
 *
 * @author Wilson Oliveira
 */
interface Autenticavel {

    public function AutentiqueAqui(FuncionarioAutenticavel $funcionario, $senha);
}
