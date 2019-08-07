<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\sistemaInterno;
use classes\abstratas\Funcionario;
use classes\abstratas\FuncionarioAutenticavel;
use classes\interfaces\Autenticavel;
/**
 * Description of GerenciadorBonificacao
 *
 * @author Wilson Oliveira
 */
class GerenciadorBonificacao implements Autenticavel{

    private $totalBonificacoes;
    private $autenticado;
    public function registrar(Funcionario $funcionario) {
        if($this->autenticado){
        $this->totalBonificacoes += $funcionario->getBonificacao();
        }else{
            throw new \Exception("Voce não esta logado!");
        }
    }

    public function getTotalBonificacoes() {
        return $this->totalBonificacoes;
    }
    public function AutentiqueAqui(FuncionarioAutenticavel $funcionario,$senha) {
        $this->autenticado =$funcionario->autenticar($senha);         
    }
}
