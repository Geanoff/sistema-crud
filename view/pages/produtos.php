<?php
    require_once __DIR__ . "\..\..\model\ProdutoModel.php";

    $produtoModel = new ProdutoModel();
    $lista = $produtoModel->listar();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $produtoModel->excluir($id); 
    } 
?>

<?php require_once __DIR__ . '..\..\components\header.php'; ?>
    <div id="sucesso" class="toast sucesso">
        <i class="fa-regular fa-circle-check"></i>
        Operação realizada com sucesso!
    </div>
    <div id="erro" class="toast erro">
        <i class="fa-regular fa-circle-check"></i>
        Falha ao executar operação!
    </div>
    <main>
        <h1>Produtos</h1>
        <form action="editar-produto.php" method="GET" class="btn-criar">
            <input type="hidden" name="id" value="">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    NOVO
                </button>
        </form>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $i) { ?>
                    <tr>
                        <td><?php echo $i->id ?></td>
                        <td><?php echo $i->nome ?></td>
                        <td><?php echo $i->descricao ?></td>
                        <td><?php echo $i->preco ?></td>
                        <td><?php echo $i->nomecat ?></td>
                        <td>
                            <!-- <form action="visualizar.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button>
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </form> -->

                            <form action="editar-produto.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button>
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                            </form>

                            <form action="produtos.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir esse produto?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>

</html>