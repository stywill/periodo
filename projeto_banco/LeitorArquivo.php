<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LeitorArquivo
 *
 * @author Wilson Oliveira
 */
class LeitorArquivo {

    private $arquivo;

    public function __construct($arquivo) {
        $this->arquivo = $arquivo;
    }
    
    public function abrirArquivo() {
        echo "Abrindo arquivos<br>";
    }
    public function lerArquivo() {
        echo "Lendo arquivo<br>";
    }
    public function escreverArquivo() {
        echo "Escrevendo arquivo<br>";
    }
    public function fechandoArquivo() {
        echo "Fechando arquivo<br>";
    }
}
