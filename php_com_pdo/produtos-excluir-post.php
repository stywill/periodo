<?php
require_once 'autoload.php';
use classes\Erro;
use classes\Produto;

try{
    $id = $_GET['id'];
    $produto = new Produto($id);
    $produto->excluir();
    header('Location:produtos.php');   
}catch(Exception $e){
    Erro::trataErro($e);
}

