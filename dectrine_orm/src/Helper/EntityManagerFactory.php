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
            /*Conectar usando o sqlite
            'driver'=>'pdo_sqlite',
            'path'=>$rootDir.'/var/data/banco.sqlite'
            */
            'driver'=>'pdo_mysql',
            'host'=>'127.0.0.1',
            'dbname'=>'curso_doctrine',
            'user'=>'root',
            'password'=>''

        ];
        return EntityManager::create($connection, $config);
    }
}
