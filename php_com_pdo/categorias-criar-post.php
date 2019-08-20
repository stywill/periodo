<?php
require'autoload.php';
use classes\Categoria;

$categoria = new Categoria();
$categoria->__set('nome',$_POST['nome']);
$categoria->inserir();

header('Location:categorias.php');

