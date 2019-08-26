<?php

namespace classes;

use classes\Conexao;

class Categoria {

    public $id;
    public $nome;
    public $produtos;
    public function __construct($id = false) {
        if ($id) {
            $this->__set('id', $id);
            $this->carregar();
        }
    }

    public function __get($par) {
        return $this->$par;
    }

    public function __set($par, $valor) {
        $this->$par = $valor;
    }

    public static function listar() {
        $query = "SELECT id, nome FROM categorias ORDER BY nome";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar() {
        //throw new \Exception('Erro ao carregar categoria');
        $query = "SELECT id, nome FROM categorias WHERE id=:id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->__get('id'));
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->__set('nome', $linha['nome']);
        return $this;
    }

    public function inserir() {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->execute();
    }

    public function atualizar() {
        $query = "UPDATE categorias SET nome = :nome WHERE id= :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->__get('id'));
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->execute();
    }

    public function excluir() {
        $query = "DELETE FROM categorias WHERE id = :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->__get('id'));
        $stmt->execute();
    }
    public function carregarProdutos() {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }
}
