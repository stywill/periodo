<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes;

use classes\Validacao;

/**
 * Description of ContaCorrente
 *
 * @author Wilson Oliveira
 */
class ContaCorrente extends Validacao {

    private $titular;
    private $agencia;
    private $numero;
    private $saldo;
    public $ultimaOperacao;
    public static $totalDeContas;
    public static $taxaOperacao;

    public function __construct($titular, $agencia, $numero, $saldo) {
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
        /*
          try {
          self::$taxaOperacao = intDiv(30, self::$totalDeContas);
          } catch (\Error $erro) {
          echo "Não é possivel realizar divisão por zero";
          exit;
          }
         */
        self::$totalDeContas++;
        self::calculaTaxaOperacao();
    }

    public static function calculaTaxaOperacao() {
        try {
            if (self::$totalDeContas < 1) {
                throw new \Exception("Valor inferior a zero");
            }
            self::$taxaOperacao = (30 / self::$totalDeContas);
        } catch (\Exception $erro) {
            echo $erro->getMessage() . "<br>";
            exit;
        }
    }

    public function getTitular() {
        return $this->titular;
    }

    public function __get($campo) {
        Validacao::protegeAtributo($atributo);
        return $this->$campo;
    }

    public function __set($campo, $valor) {
        Validacao::protegeAtributo($atributo);
        $this->$campo = $valor;
    }

    public function ultimaOperacao($operacao) {
        $this->ultimaOperacao = $operacao;
        return $this;
    }

    public function sacar($valor) {
        $this->ultimaOperacao("sacar");
        Validacao::verificaNumerico($valor);
        $this->saldo = $this->saldo - $valor;
        return $this;
    }

    public function depositar($valor) {
        $this->ultimaOperacao("depositar");
        Validacao::verificaNumerico($valor);
        $this->saldo = $this->saldo + $valor;
        return $this;
    }

    public function transferir($valor, ContaCorrente $conta) {
        $this->ultimaOperacao("transferir");
        Validacao::verificaNumerico($valor);
       
        $this->sacar($valor);
        $conta->depositar($valor);
    }

}
