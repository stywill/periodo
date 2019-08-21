<?php

namespace classes;
use classes\Conexao;

class Categoria {

    public $id;
    public $nome;
    
    public function __construct($id = false){
        if($id){
            $this->__set('id',$id);
            $this->carregar();
        }
    }
    public function __get($par) {
        return $this->$par;
    }

    public function __set($par, $valor) {
        $this->$par = $valor;
    }

    public function listar() {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function carregar() {
        $query = "SELECT id, nome FROM categorias WHERE id=".$this->__get('id');
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $listar = $resultado->fetchAll();
        foreach ($listar as $lista) {
            $this->__set('nome',$lista['nome']);           
        }
        return $this;
    }
    public function inserir() {
        $query = "INSERT INTO categorias (nome) VALUES ('$this->nome')";
        $conexao = Conexao::pegaConexao();
        $conexao->exec($query);
    }
    public function atualizar() {
        $query = "UPDATE categorias SET nome = '{$this->__get('nome')}' WHERE id= {$this->__get('id')}";
        $conexao = Conexao::pegaConexao();
        $conexao->exec($query);
    }
    public function excluir() {
        $query = "DELETE FROM categorias WHERE id = {$this->__get('id')}";
        $conexao = Conexao::pegaConexao();
        $conexao->exec($query);
    }
    
}
