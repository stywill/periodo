<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$alunos = new Aluno($argv[1]);
$alunos->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();

$entityManager = $entityManagerFactory->getEntityManager();
$entityManager->persist($alunos);
$entityManager->flush();

//inserir varios alunos
/*
$alunoBruno = new Aluno();
$alunoBruno->setNome("Bruno Furtado");
$entityManager->persist($alunoBruno);
$alunoFabiana = new Aluno();
$alunoFabiana->setNome("Fabiana Bahia");
$entityManager->persist($alunoFabiana);
$alunoAntonio = new Aluno();
$alunoAntonio->setNome("Antonio Bahia");
$entityManager->persist($alunoAntonio);
$alunoNina = new Aluno();
$alunoNina->setNome("Eunice Bahia");
$entityManager->persist($alunoNina);
$entityManager->flush();
*/

