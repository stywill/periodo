<?php

use Wilson\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

//aqui vai o autoload do projeto
require_once __DIR__.'/vendor/autoload.php';

// aqui vai a classe entityManager criada para o projeto
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
return ConsoleRunner::createHelperSet($entityManager);