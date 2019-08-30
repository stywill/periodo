<?php

use Wilson\Doctrine\Entity\Aluno;
use Wilson\Doctrine\Entity\Telefone;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno($argv[1]);
$aluno->setNome($argv[1]);

for($i =2; $i < $argc; $i++){
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    /* o telefone é inserido na classe aluno com o parametro cascade={"remove","persist"}*/
    $telefone->setNumero($numeroTelefone);

    $aluno->addTelefone($telefone);
}


$entityManager->persist($aluno);
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

