<?php 
    require_once __DIR__ . "\..\config\database.php";
    Class CategoriaModel {
        private $tabela = 'categoria';
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
        function editar($id, $nome) {
            $query = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt) {
                return header('Location: categorias.php?mensagem=sucesso');
            } else {
                return header('Location: categorias.php?mensagem=erro');
            } 
        }
    }
    // class CategoriaModel {
    //     private $conn;
    //     private $pdo;
    //     public function __construct() {
    //         global $pdo;
    //         $this->pdo = $pdo;
    //     }

    //     public function listar() {
    //         $query = 'SELECT * FROM $this->tabela';

    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute();

    //         return $stmt->fetchAll();
    //     }
    // }
?>