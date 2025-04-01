<?php
    require_once __DIR__ . "\..\..\model\ProdutoModel.php";

    $produtoModel = new ProdutoModel();
    $lista = $produtoModel->listar();
?>

<?php require_once __DIR__ . '..\..\components\header.php'; ?>
    <div id="sucesso" class="toast sucesso">
        <i class="fa-regular fa-circle-check"></i>
        Operação realizada com sucesso!
    </div>
    <main>
        <h1>Produtos</h1>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $i) { ?>
                    <tr>
                        <td><?php echo $i->id ?></td>
                        <td><?php echo $i->nome ?></td>
                        <td><?php echo $i->descricao ?></td>
                        <td><?php echo $i->preco ?></td>
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

                            <form action="excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir o filme?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- <div class="cards">
            <?php foreach ($produtos as $produto) { ?>
                <div class="card">
                    <span id="id">#<?php echo $produto['id']?></span>
                    <h3><?php echo $produto['nome']?></h3>
                    <p><?php echo $produto['descricao']?></p>
                    <div class="card-categoria">
                        <i class="fa-solid fa-tag"></i>
                        <span><?php echo $produto['categoria']?></span>
                    </div>
                    <h4>R$ <?php echo $produto['preco']?></h4>
                    <div class="card-botoes">
                        <form action="visualizar.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                            <button id="icon-ver">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </form>
                        <form action="editar.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $filme['id'] ?>">
                            <button id="icon-editar">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </form>
                        <form action="excluir.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $filme['id'] ?>">
                            <button id="icon-excluir" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div> -->
    </main>
    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>

</html>