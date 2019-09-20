<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
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
        $queryString = $request->getQueryParams();
        $id = filter_var($queryString['id'],FILTER_VALIDATE_INT);
        /**
         * @var Curso $curso
         */
        $curso = $this->repositorioDeCursos->find($id);

       $html = $this->renderizaHtml("cursos/formulario.php",[
            "curso"=>$curso,
            "titulo"=>"Editar Curso: ".$curso->getDescricao()
        ]);
       return new Response(302,[],$html);
    }
}