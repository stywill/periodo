<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calculadora
 *
 * @author Wilson Oliveira
 */
class Calculadora {

    public function calculaMedia(array $notas){
        $quantidadeNotas = sizeof($notas);
        if ($quantidadeNotas > 0) {
            $soma = 0;
            for ($i = 0; $i < $quantidadeNotas; $i++) {
                $soma = $soma + $notas[$i];
            }
            $media = $soma / $quantidadeNotas;
            return $media;
        } else {
            return NULL;
        }
    }

}
