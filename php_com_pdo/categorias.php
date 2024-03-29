<?php
require_once 'cabecalho.php';

use classes\Categoria;
use classes\Erro;

try {
    $lista = Categoria::listar();
} catch (\Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Categorias</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="categorias-criar.php" class="btn btn-info btn-block">Crair Nova Categoria</a>
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
                        <th class="acao">Editar</th>
                        <th class="acao">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linha): ?>
                        <tr>
                            <td><a href="categorias-detalhe.php?id=<?= $linha['id'] ?>" class="btn btn-link"><?= $linha['id'] ?></a></td>
                            <td><a href="categorias-detalhe.php?id=<?= $linha['id'] ?>" class="btn btn-link"><?= $linha['nome'] ?></a></td>
                            <td><a href="categorias-editar.php?id=<?= $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                            <td><a href="categorias-excluir-post.php?id=<?= $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
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
