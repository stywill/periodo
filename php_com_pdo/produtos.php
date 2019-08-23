<?php require_once 'cabecalho.php' ?>
<?php

use classes\Produto;
use classes\Erro;

try {
    $lista = Produto::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Crair Novo Produto</a>
    </div>
</div>
<div class="row">
    <?php if (count($lista) > 0): ?>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th class="acao">Editar</th>
                        <th class="acao">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linhas): ?>
                        <tr>
                            <td><?= $linhas['id']; ?></td>
                            <td><?= $linhas['nome']; ?></td>
                            <td>R$ <?= $linhas['preco']; ?></td>
                            <td><?= $linhas['quantidade']; ?></td>
                            <td><?= $linhas['categoria_nome']; ?></td>
                            <td><a href="/produtos-editar.php?id=<?=$linhas['id'];?>" class="btn btn-info">Editar</a></td>
                            <td><a href="/produtos-excluir-post.php?id=<?=$linhas['id'];?>" class="btn btn-danger">Excluir</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Nenhum registro encontrado</p>
    <?php endif; ?>
</div>

<?php require_once 'rodape.php' ?>
