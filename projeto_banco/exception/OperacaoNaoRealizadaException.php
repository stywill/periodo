<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace exception;

/**
 * Description of OperacaoNaoRealizadaException
 *
 * @author Wilson Oliveira
 */
class OperacaoNaoRealizadaException extends \Exception {
    
    public function __construct($mensagem,$codigo,$ex) {
        parent::__construct($mensagem, $codigo, $ex);
    }
    
    public function __toString() {
        return $this->getCode().":".$this->getMessage();
    }
}
