<?php
    require_once __DIR__ . "\..\..\model\CategoriaModel.php";
    $categoriaModel = new CategoriaModel();

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $lista = $categoriaModel->buscarId($id); 
    } else {
        $lista = (object) [
            'id' => '',
            'nome' => ''
        ];
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        
        if (!empty($id)) {
            $categoriaModel->editar($id, $nome); 
        } else {
            $categoriaModel->criar($nome); 
        }
    
        header('Location: categorias.php?mensagem=sucesso');
        exit();
    } 


    
    

    require_once __DIR__ . '..\..\components\header.php';
?>

<main>
    <form action="editar-categoria.php" method="POST">
        <h1><?php echo empty($lista->id) ? 'CRIAR NOVA CATEGORIA' : 'EDITAR UMA CATEGORIA'; ?></h1>
        <input type="hidden" name="id" value="<?php echo $lista->id ?>">
        <div class="inputBox">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo $lista->nome ?>" required>
        </div>
        <button class="btn"><?php echo empty($lista->id) ? 'CRIAR' : 'ALTERAR'; ?></button>
    </form>
</main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>