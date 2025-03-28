<?php
    require_once __DIR__ . "\..\..\model\CategoriaModel.php";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        $categoriaModel = new CategoriaModel();
        $lista = $categoriaModel->buscarId($id); 
    } 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $categoriaModel = new CategoriaModel();
        $categoriaModel->editar($id, $nome); 
    } 
    

    require_once __DIR__ . '..\..\components\header.php';
?>

<main>
    <form action="editar-categoria.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $lista->id ?>">
        <div class="inputBox">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo $lista->nome ?>">
        </div>
        <button>SALVAR</button>
    </form>
</main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>