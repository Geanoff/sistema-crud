<?php 
    require_once __DIR__ . "\..\config\database.php";
    Class ProdutoModel {
        private $tabela = 'produto';
        private $pdo; 

        public function __construct() {
            global $pdo;
            $this->pdo = $pdo;
        }

        function listar() {
            $query = "SELECT * FROM $this->tabela";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetchAll(); 
        }

        function buscarId($id) {
            $query = "SELECT * FROM $this->tabela WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetch(); 
        }

        function editar($id, $nome, $descricao, $preco) {
            $query = "UPDATE $this->tabela SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt) {
                return header('Location: produtos.php?mensagem=sucesso');
            } else {
                return header('Location: produtos.php?mensagem=erro');
            } 
        }
    }
?>