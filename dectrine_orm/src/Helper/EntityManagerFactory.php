<?php
namespace Wilson\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface ;
use Doctrine\ORM\Tools\Setup;
/**
 * Description of EntityManagerFactory
 *
 * @author Wilson Oliveira
 */
class EntityManagerFactory 
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORMException
     */
    public function getEntityManager():EntityManagerInterface 
    {
        $rootDir = __DIR__.'/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
                [$rootDir.'/src'],
                true
                );
        $connection = [
            'driver'=>'pdo_sqlite',
            'path'=>$rootDir.'/var/data/banco.sqlite'
        ];
        return EntityManager::create($connection, $config);
    }
}
