<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classeAluno = Aluno::class;

$dqlR = "SELECT a FROM $classeAluno a";
$queryR = $entityManager->createQuery($dqlR);
$totalAlunosR = $queryR->getResult();
echo "Total de alunos usando getResult:".count($totalAlunosR)."\n\n";


$dql = "SELECT count(a) FROM $classeAluno a ";
$query = $entityManager->createQuery($dql);
$totalAlunosScalar = $query->getScalarResult();
echo "Total de alunos usando getScalarResult:\n\n";
var_dump($totalAlunosScalar);
echo "\n\n";

$totalAlunosSingleScalar = $query->getSingleScalarResult();
echo "Total de alunos usando getSingleScalarResult:$totalAlunosSingleScalar \n\n";
