<?php
require_once __DIR__ . "\..\..\model\ProdutoModel.php";
require_once __DIR__ . "\..\..\model\CategoriaModel.php";

$categoriaModel = new CategoriaModel();
$nomecat = $categoriaModel->listar();

$produtoModel = new ProdutoModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $lista = $produtoModel->buscarId($id);
} else {
    $lista = (object) [
        'id' => '',
        'nome' => '',
        'descricao' => '',
        'preco' => '',
        'categoria_id' => ''
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    if (!empty($id)) {
        $produtoModel->editar($id, $nome, $descricao, $preco, $categoria);
    } else {
        $produtoModel->criar($nome, $descricao, $preco, $categoria);
    }

    header('Location: produtos.php?mensagem=sucesso');
    exit();
}

require_once __DIR__ . '..\..\components\header.php';
?>

<main>
    <form action="editar-produto.php" method="POST">
        <h1><?php echo empty($lista->id) ? 'CRIAR NOVO PRODUTO' : 'EDITAR UM PRODUTO'; ?></h1>
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

        <div class="inputBox">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <?php foreach ($nomecat as $i) { ?>
                    <option value="<?php echo $i->id; ?>" 
                        <?php echo ($i->id == $lista->categoria_id) ? 'selected' : ''; ?>>
                        <?php echo $i->nome; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button class="btn"><?php echo empty($lista->id) ? 'CRIAR' : 'ALTERAR'; ?></button>
    </form>
</main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>
