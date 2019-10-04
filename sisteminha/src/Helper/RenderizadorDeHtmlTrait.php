<?php


namespace Sistema\Generico\Helper;


trait RenderizadorDeHtmlTrait
{
    public function renderizaHtml(string $caminhoTemplate, array $dados)
    {
        extract($dados);
        ob_start();
        require __DIR__ . "/../../view/".$caminhoTemplate;
        $html = ob_get_clean();
        return $html;
    }
}