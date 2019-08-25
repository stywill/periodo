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
        $query = "INSERT INTO  produtos (nome,preco,quantidade,categoria_id) "
                . "VALUES (:nome,:preco,:quantidade,:categoria_id)";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->nome);
        $stmt->bindValue(':preco',$this->preco);
        $stmt->bindValue(':quantidade',$this->quantidade);
        $stmt->bindValue(':categoria_id',$this->categoria_id);
        $stmt->execute();
    }
}
