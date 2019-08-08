<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace exception;
/**
 * Description of SaldoInsuficienteException
 *
 * @author Wilson Oliveira
 */
class SaldoInsuficienteException extends \Exception {
    private $valor;
    private $saldo;
    public function __construct($mensagem, $valor, $saldo) {
        $this->valor = $valor;
        $this->saldo = $saldo;
        parent::__construct($mensagem, null, null);
    }
    public function __get($param) {
        return $this->$param;
    }
}
