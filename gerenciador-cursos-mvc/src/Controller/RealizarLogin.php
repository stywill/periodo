<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;
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
            $this->defineMensagem("danger","E-mail invalido");
            header("Location: /login");
            return;
        }
        $senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_STRING);
        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioDeUsuario->findOneBy(["email"=>$email]);
        if(is_null($senha) || is_null($usuario)|| !$usuario->senhaEstaCorreta($senha)){
            $this->defineMensagem("danger","E-mail ou senha inválidos");
            header("Location: /login");
            return;
        }
        $_SESSION['logado'] = true;
        header("Location: /listar-cursos");
    }
}