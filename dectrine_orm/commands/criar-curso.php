<?php

use Wilson\Doctrine\Entity\Curso;
use Wilson\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$curso = new Curso($argv[1]);
$curso->setNome($argv[1]);
$entityManager->persist($curso);
$entityManager->flush();