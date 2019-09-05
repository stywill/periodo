<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityRepository;

class FormularioEdicao extends ControllerComHtml implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
       $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        /**
         * @var Curso $curso
         */
       $curso = $this->repositorioDeCursos->find($id);

        echo $this->renderizaHtml("cursos/formulario.php",[
            "curso"=>$curso,
            "titulo"=>"Editar Curso: ".$curso->getDescricao()
        ]);
    }
}