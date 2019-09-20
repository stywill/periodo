<?php

use Alura\Cursos\Infra\EntityManagerCreator;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

$containerBuider = new ContainerBuilder();

$containerBuider->addDefinitions([
    EntityManagerInterface::class => function(){
     return (new EntityManagerCreator())->getEntityManager();
    }
]);

$container = $containerBuider->build();

return $container;