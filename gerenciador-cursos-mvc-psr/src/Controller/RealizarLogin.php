<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var EntityManagerInterface
     */
    private $repositorioDeUsuario;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuario = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
        if(is_null($email) || $email===false){
            $mensagem = $this->defineMensagem("danger","E-mail invalido");
            return new Response(302,["Location"=>"/login"],$mensagem);
        }
        $senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_STRING);
        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioDeUsuario->findOneBy(["email"=>$email]);
        if(is_null($senha) || is_null($usuario)|| !$usuario->senhaEstaCorreta($senha)){
            $mensagem = $this->defineMensagem("danger","E-mail ou senha inválidos");
            return new Response(302,["Location"=>"/login"],$mensagem);
        }
        $_SESSION['logado'] = true;
        return new Response(200,["Location"=>"/listar-cursos"]);
    }
}