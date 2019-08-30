<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Entity\Curso;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

/** @var Aluno $aluno*/
$aluno = $entityManager->find(Aluno::class,$idAluno);
/** @var Curso $curso*/
$curso = $entityManager->find(Curso::class,$idCurso);

$curso->addAluno($aluno);

$entityManager->flush();