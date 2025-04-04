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

        function criar($nome, $email, $telefone, $data, $cpf) {
            $query = "INSERT INTO $this->tabela (nome, email, telefone, data_nascimento, cpf)
                      VALUES (:nome, :email, :telefone, :datan, :cpf)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':datan', $data);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: usuarios.php?mensagem=sucesso');
            } else {
                header('Location: usuarios.php?');
            }
        }

        function editar($id, $nome, $email, $telefone, $data, $cpf) {
            try {
                $query = "UPDATE $this->tabela SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_n, cpf = :cpf WHERE id = :id";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':telefone', $telefone);
                $stmt->bindParam(':data_n', $data);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {
                    header('Location: usuarios.php?mensagem=sucesso');
                } else {
                    header('Location: usuarios.php?');
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
                header('Location: usuarios.php?mensagem=sucesso');
            } else {
                header('Location: usuarios.php?mensagem=erro');
            }
            exit();
        }
        
    }
?>