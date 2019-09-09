<?php
require __DIR__."/../vendor/autoload.php";

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$caminho = (!isset($_SERVER['PATH_INFO']))?"/login":$_SERVER['PATH_INFO'];
$rotas = require __DIR__."/../config/routes.php";

if(!array_key_exists($caminho,$rotas)){
    http_response_code(404);
    exit();
}
session_start();
$ehRotaLogin = stripos($caminho,"login");
if(!isset($_SESSION['logado']) && $ehRotaLogin===false){
    header("Location:/login");
    exit();
}
$classeControladora = $rotas[$caminho];
/**
* @var InterfaceControladorRequisicao $controlador
*/
$controlador = new $classeControladora();
$controlador->processaRequisicao();



