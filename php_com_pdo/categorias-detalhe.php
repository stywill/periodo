<?php require_once 'cabecalho.php' ?>
<?php

use classes\Erro;
use classes\Categoria;

try {
    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->carregarProdutos();
    $listaProdutos = $categoria->produtos;
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?= $categoria->id; ?></dd>
    <dt>Nome</dt>
    <dd><?= $categoria->nome; ?></dd>
    <dt>Produtos</dt>
    <?php if (count($listaProdutos) > 0): ?>
        <dd>
            <ul>
                <?php foreach ($listaProdutos as $linhas): ?>
                    <li><a href="produtos-editar.php?id=<?= $linhas['id']; ?>"><?= $linhas['nome']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </dd>
    <?php else: ?>
        <dd>Não existem produtos para esta categoria</dd>
    <?php endif ?>
</dl>
<?php require_once 'rodape.php' ?>
