<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Entity\Telefone;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

/* Esse codigo vai ser substituido pelo Doctrine Query Language (dql)
* usando o createQuery()
$alunosRepository = $entityManager->getRepository(Aluno::class);
$alunosList = $alunosRepository->findAll();
*
*Ctrl+ALT+v para passar um conteudo para uma varialve*/
$dql = "SELECT aluno FROM Wilson\\Doctrine\Entity\Aluno  aluno";
$query = $entityManager->createQuery($dql);
$alunosList = $query->getResult();

/**
 * @var Aluno[] $alunosList
 */
echo "Buscar todos\n";
foreach ($alunosList AS $aluno){
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone){
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()}\nNome:{$aluno->getNome()}\n";
    echo "Telefones:".implode(', ',$telefones)."\n\n";
}
/*
echo "\nBuscar por id\n";
$buscaId = $alunosRepository->find(2);
echo "ID: {$buscaId->getId()}\nNome:{$buscaId->getNome()}\n\n";

echo "\nBuscar por Nome\n";
/*para buscar mais de um por qualquer coluna da tabela usa o 'findBy'*/
/*
$buscaNome = $alunosRepository->findOneBy(['nome'=>'Juliana Bahia']);
var_dump($buscaNome);
*/