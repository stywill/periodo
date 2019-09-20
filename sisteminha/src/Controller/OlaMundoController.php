<?php
namespace Sistema\Generico\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Sistema\Generico\Helper\RenderizadorDeHtmlTrait;


class OlaMundoController implements RequestHandlerInterface
{
   use RenderizadorDeHtmlTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml("ola-mundo.php",[]);
        return new Response(200,[],$html);
    }
}