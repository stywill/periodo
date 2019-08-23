<?php
namespace classes;
use classes\Conexao;
class Produto {
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;
    
    public static function listar() {
        $query = "SELECT p.id,p.nome, preco, quantidade, c.nome AS categoria_nome "
                . "FROM produtos p "
                . "LEFT JOIN categorias c ON p.categoria_id = c.id "
                . "ORDER BY p.nome";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function inserir(){
        $query = "INSERT produtos (nome,preco,quantidade,categoria_id) "
                . "VALUES ('{$this->nome}',{$this->preco},{$this->quantidade},{$this->categoria_id})";
        $conexao = Conexao::pegaConexao();
        $conexao->exec($query);
    }
}
