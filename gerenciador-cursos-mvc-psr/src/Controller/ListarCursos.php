<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\{Http\Message\ResponseInterface, Http\Message\ServerRequestInterface, Http\Server\RequestHandlerInterface};
use Nyholm\Psr7\Response;

class ListarCursos implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    /**
     * @var EntityManagerInterface
     */
    private $repositorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager ->getRepository(Curso::class);
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursos = $this->repositorioDeCursos->findAll();
        $html = $this->renderizaHtml("cursos/listar-cursos.php",[
            "cursos"=>$cursos,
            "titulo"=>"Listar Cursos"
        ]);
        return new Response(302,[],$html);
    }
}