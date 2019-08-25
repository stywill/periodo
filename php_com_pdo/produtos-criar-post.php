<?php

require_once 'autoload.php';

use classes\Erro;
use classes\Produto;

try {
    $produto = new Produto();
    $produto->nome = $_POST['nome'];
    $produto->preco = $_POST['preco'];
    $produto->quantidade = $_POST['quantidade'];
    $produto->categoria_id = $_POST['categoria_id'];
    $produto->inserir();
    header('Location:produtos.php');
} catch (Exception $e) {
    Erro::trataErro($e);
}
