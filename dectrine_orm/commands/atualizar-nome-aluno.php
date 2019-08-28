<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunosRepository = $entityManager->getRepository(Aluno::class);

$id = $argv[1];
$novoNome = $argv[2];
/**
 * @var Aluno $alunoAtualiza
 */
$alunoAtualiza = $alunosRepository->find($id);

$alunoAtualiza->setNome($novoNome);

$entityManager->flush();