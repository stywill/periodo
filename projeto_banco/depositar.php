<?php
include"autoload.php";

use classes\Validacao;
use classes\ContaCorrente;
//use LeitorArquivo; Não precisa porque a classe e o arquivo estão no mesmo diretorio
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $arquivo = new LeitorArquivo("log_deposito.txt");
            $arquivo->abrirArquivo();
            $arquivo->escreverArquivo();
            $contaMario = new ContaCorrente("Mario Batista", "1212", "343477-9", 100.00);
            $contaMario->depositar(-50000.00);
            $arquivo->escreverArquivo();
        } catch (\Exception $e) {
            $arquivo->escreverArquivo();
            echo $e->getMessage()."<br>";
        } finally {
            $arquivo->fechandoArquivo();
        }
        echo "<br>";
        var_dump(ContaCorrente::$taxaOperacao);
        ?>
    </body>
</html>
