<?php
require'autoload.php';
use classes\Categoria;
$id = $_GET['id'];
$categoria = new Categoria($id);

$categoria->excluir();

header('Location:categorias.php');


