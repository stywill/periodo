<?php
include_once 'classes/config.php';
function load($namespace){
    $namespace = str_replace("\\","/",$namespace);
    $caminhoAbsoluto = __DIR__."/".$namespace.".php";
    return include_once $caminhoAbsoluto;
}
spl_autoload_register(__NAMESPACE__."\load");