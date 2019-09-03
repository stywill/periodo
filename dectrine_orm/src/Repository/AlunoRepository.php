<?php


namespace Wilson\Doctrine\Repository;


use Doctrine\ORM\EntityRepository;
use Wilson\Doctrine\Entity\Aluno;

class AlunoRepository extends EntityRepository
{
    public function buscaCursoPoraluno(){
       $query = $this->createQueryBuilder('a')
                ->join('a.telefones','t')
                ->join('a.cursos','c')
                ->addSelect('t')
                ->addSelect('c')
                ->getQuery();
        return $query->getResult();
    }
}