<?php

use Doctrine\DBAL\Logging\DebugStack;
use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Entity\Telefone;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';
$entityManagerFactory = new EntityManagerFactory();
$entityManeger = $entityManagerFactory->getEntityManager();

$debugStack = new DebugStack();
$entityManeger->getConfiguration()->setSQLLogger($debugStack);

$classeAluno = Aluno::class;

$dql = "SELECT aluno,telefones,cursos FROM $classeAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
$query = $entityManeger->createQuery($dql);
/**@var Aluno[] $alunos*/
$alunos = $query->getResult();

foreach ($alunos as $aluno){
    $telefones = $aluno->getTelefones()
        ->map(function (Telefone $telefone){
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: ".implode(',',$telefones)."\n";

    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso){
        echo "\tID Curso: {$curso->getId()}\n";
        echo "\tCurso: {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n\n";
}
echo "Debug Querys\n";
foreach ($debugStack->queries as $queryInfo){
    echo "\t{$queryInfo['sql']}\n";
}