<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Exclusao implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManeger;

    public function __construct()
    {
        $this->entityManeger = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
       $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
       if(is_null($id) || $id ===false){
          header('Location: /listar-cursos',false,302);
           return;
       }
       $cursos = $this->entityManeger->getReference(Curso::class,$id);
       $this->entityManeger->remove($cursos);
       $this->entityManeger->flush();
       header('Location: /listar-cursos',false,302);
    }
}