<?php 
    require_once __DIR__ . "\..\config\database.php";

    Class Categoria {
        private $tabela = 'categoria';
        private $pdo; 

        public function __construct() {
            global $pdo;
            $this->pdo = $pdo;
        }

        function buscarTodos() {
            $query = "select * from $this->tabela";//order by id desc
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetchAll(); 
        }
    }
?>


