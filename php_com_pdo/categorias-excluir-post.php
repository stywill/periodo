<?php

require'autoload.php';

use classes\Categoria;
use classes\Erro;

try {
    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->excluir();
    header('Location:categorias.php');
} catch (\Exception $e) {
    Erro::trataErro($e);
}