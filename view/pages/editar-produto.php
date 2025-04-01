<?php
    require_once __DIR__ . "\..\..\model\ProdutoModel.php";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        $produtoModel = new ProdutoModel();
        $lista = $produtoModel->buscarId($id); 
    } 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $produtoModel = new ProdutoModel();
        $produtoModel->editar($id, $nome, $descricao, $preco); 
    } 
    

    require_once __DIR__ . '..\..\components\header.php';
?>

<main>
    <form action="editar-produto.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $lista->id ?>">
        <div class="inputBox">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo $lista->nome ?>" required>
        </div>
        <div class="inputBox">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" cols="40" rows="6" required><?php echo $lista->descricao ?></textarea>
        </div>
        <div class="inputBox">
            <label for="preco">Valor</label>
            <input type="text" name="preco" value="<?php echo $lista->preco ?>" required>
        </div>
        <button class="btn">ALTERAR</button>
    </form>
</main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>