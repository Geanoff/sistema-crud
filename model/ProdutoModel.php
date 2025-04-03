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
            $query = "SELECT p.*, c.nome as nomecat FROM $this->tabela p INNER JOIN categoria c ON p.categoria_id = c.id";
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

        function criar($nome, $descricao, $preco, $categoria) {
            $query = "INSERT INTO $this->tabela (nome, descricao, preco, categoria_id)
                      VALUES (:nome, :descricao, :preco, :categoria)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: produtos.php?mensagem=sucesso');
            } else {
                header('Location: produtos.php?');
            }
        }

        function editar($id, $nome, $descricao, $preco, $catid) {
            try{
                $query = "UPDATE $this->tabela SET nome = :nome, descricao = :descricao, preco = :preco, categoria_id = :catid WHERE id = :id";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':descricao', $descricao);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':catid', $catid);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    header('Location: produtos.php?mensagem=sucesso');
                } else {
                    header('Location: produtos.php?');
                }
            } catch (PDOException) {
                header('Location: usuarios.php?mensagem=erro');
            }
            exit();
        }

        function excluir($id) {
            $query = "DELETE FROM $this->tabela WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {
                header('Location: produtos.php?mensagem=sucesso');
            } else {
                header('Location: produtos.php?mensagem=erro');
            }
            exit();
        }
    }
?>