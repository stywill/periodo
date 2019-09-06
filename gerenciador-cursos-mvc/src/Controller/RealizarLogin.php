<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeUsuario;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuario = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
        if(is_null($email) || $email===false){
            echo "E-mail não encontrado!!";
            return;
        }
        $senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_STRING);
        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioDeUsuario->findOneBy(["email"=>$email]);
        if(is_null($senha) || !$usuario->senhaEstaCorreta($senha)){
            echo "E-mail ou senha inválidos";
            return;
        }
        $_SESSION['logado'] = true;
        header("Location: /listar-cursos");
    }
}