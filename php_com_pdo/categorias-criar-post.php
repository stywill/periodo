<?php

require'autoload.php';

use classes\Categoria;
use classes\Erro;

try {
    $categoria = new Categoria();
    $categoria->__set('nome', $_POST['nome']);
    $categoria->inserir();
    header('Location:categorias.php');
} catch (\Exception $e) {
    Erro::trataErro($e);
}


