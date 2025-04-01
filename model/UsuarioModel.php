<?php 
    require_once __DIR__ . "\..\config\database.php";
    Class UsuarioModel {
        private $tabela = 'usuario';
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

        function editar($id, $nome, $email, $telefone, $data, $cpf) {
            $query = "UPDATE $this->tabela SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_n, cpf = :cpf WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_n', $data);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt) {
                return header('Location: usuarios.php?mensagem=sucesso');
            } else {
                return header('Location: usuarios.php?mensagem=erro');
            } 
        }
    }
?>