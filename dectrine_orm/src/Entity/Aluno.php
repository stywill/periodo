<?php

namespace Wilson\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity(repositoryClass="Wilson\Doctrine\Repository\AlunoRepository")
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nome;
    /**
     * @OneToMany(targetEntity="Telefone",mappedBy="aluno",cascade={"remove","persist"}, fetch="EAGER")
     */
    private $telefones;
    /**
     * @ManyToMany(targetEntity="Curso",mappedBy="alunos")
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome($nome):self
    {
        $this->nome = $nome;
        return $this;
    }
    public function addTelefone(Telefone $telefone):self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }
    /**@return Telefone[]*/
    public function getTelefones():Collection
    {
        return $this->telefones;
    }
    public function addCurso(Curso $curso):self
    {
        if($this->cursos->contains($curso)){
            return $this;
        }
        $this->cursos->add($curso);
        $curso->addAluno($this);
        return $this;
    }
    /**@return Curso[]*/
    public function getCursos():Collection
    {
        return $this->cursos;
    }
}
