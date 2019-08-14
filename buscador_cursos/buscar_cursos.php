<?php
/*
Para inserir classes ao autoload.php do composer 
 * 1- inserir a seguinte classe ao 
 *  */
require "vendor/autoload.php";

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Stywill\BuscadorDeCursos\Buscador;


/* 
Na minha instalação do php estou com o seguinte erro 
 * Fatal error: Uncaught GuzzleHttp\Exception\RequestException: cURL error 60: SSL certificate problem: unable to get local issuer certificate (see http://curl.haxx.se/libcurl/c/libcurl-errors.html) in 
 * Pelo que questquisei tenho que atualizar a versao do cURL
 * 
 * Uma forma mais simples de resolver isso é usando o ['verify' => false] direto na classe Client()
 *  */

$client = new Client(['base_uri'=>'https://www.alura.com.br/','verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($client,$crawler);
$cursos = $buscador->buscar("cursos-online-programacao/php");

foreach ($cursos as $curso) {
    echo exibeMensagem($curso);
}
