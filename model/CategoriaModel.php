<?php
require_once __DIR__ . "\..\config\database.php";
class CategoriaModel
{
    private $tabela = 'categoria';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function listar()
    {
        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }

    function buscarId($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    function criar($nome)
    {
        $query = "INSERT INTO $this->tabela (nome)
                      VALUES (:nome)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header('Location: categorias.php?mensagem=sucesso');
        } else {
            header('Location: categorias.php?');
        }
    }

    function editar($id, $nome)
    {
        $query = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header('Location: categorias.php?mensagem=sucesso');
        } else {
            header('Location: categorias.php?mensagem=erro');
        }
    }

    function excluir($id)
    {
        try {
            $query = "DELETE FROM $this->tabela WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header('Location: categorias.php?mensagem=sucesso');
            } else {
                header('Location: categorias.php?mensagem=erro');
            }
        } catch (PDOException) {
            header('Location: categorias.php?mensagem=erro');
        }
        exit();
    }
}
