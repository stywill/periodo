<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];

/*para remover um registro não é necessario usar
$alunosRepository = $entityManager->getRepository(Aluno::class);
e nem fazer um select na tabela.
Com o getReference passando o nome da entidade e o id o doctrine faz o delete direto.
O unico problema é que não posso usar condições para verificar se o objeto existe.
*/
$aluno = $entityManager->getReference(Aluno::class,$id);

$entityManager->remove($aluno);
$entityManager->flush();