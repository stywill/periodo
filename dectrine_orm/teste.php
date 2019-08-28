<?php
require_once __DIR__.'/vendor/autoload.php';

use Wilson\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

var_dump($entityManager->getConnection());