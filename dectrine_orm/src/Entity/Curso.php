<?php


namespace Wilson\Doctrine\Entity;
use Doctrine\ORM\Mapping as ORM;
use mysql_xdevapi\Collection;

/**
 * @Entity
 */

class Curso
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
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function getId():int
    {
        return $this->id;
    }

    public function setId(int $id):self
    {
        $this->id = $id;
        return $this;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function setNome(string $nome):self
    {
        $this->nome = $nome;
        return $this;
    }
    public function addAluno(Aluno $aluno):self
    {
        if($this->alunos->contains($aluno)){
            return $this;
        }
        $this->alunos->add($aluno);
        $aluno->addCurso($this);
        return $this;
    }

    public function getAlunos():Collection
    {
        return $this->alunos;
    }

}