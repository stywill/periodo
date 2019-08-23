<?php

require_once 'autoload.php';

use classes\Categoria;
use classes\Erro;

try {
    $id = $_POST['id'];
    $categoria = new Categoria($id);
    $categoria->__set('nome', $_POST['nome']);
    $categoria->atualizar();
    header('Location:categorias.php');
} catch (\Exception $e) {
    Erro::trataErro($e);
}