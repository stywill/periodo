<?php
require __DIR__."/../vendor/autoload.php";

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use function DI\get;

$caminho = (!isset($_SERVER['PATH_INFO']))?"/login":$_SERVER['PATH_INFO'];
$rotas = require __DIR__."/../config/routes.php";

if(!array_key_exists($caminho,$rotas)){
    http_response_code(404);
    exit();
}
session_start();
//$ehRotaLogin = stripos($caminho,"login");
//if(!isset($_SESSION['logado']) && $ehRotaLogin===false){
//    header("Location:/login");
//    exit();
//}
//psr7
$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);
/**
 * @var ServerRequestCreator $request
 */
$request = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
/**
 * @var \Psr\Container\ContainerInterface $container
 */
$container = require __DIR__."/../config/dependencies.php";
/**
* @var \Psr\Http\Server\RequestHandlerInterface $controlador
*/
$controlador = $container->get($classeControladora);
$resposta = $controlador->handle($request);
foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
echo $resposta->getBody();

