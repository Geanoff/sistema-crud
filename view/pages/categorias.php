<?php
    require_once __DIR__ . "\..\..\model\CategoriaModel.php";

    $categoriaModel = new CategoriaModel();
    $lista = $categoriaModel->listar();
?>

<?php require_once __DIR__ . '..\..\components\header.php'; ?>
<?php
    // foreach ($lista as $i) {
    //     echo "ID: {$i->id} - Nome: {$i->nome} <br>";
    // }
?>
<div id="sucesso" class="toast sucesso">
        <i class="fa-regular fa-circle-check"></i>
        Operação realizada com sucesso!
    </div>
<main>
        <h1>Categorias</h1>

        <table class="table" id="">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $i) { ?>
                    <tr>
                        <td><?php echo $i->id ?></td>
                        <td><?php echo $i->nome ?></td>
                        <td>
                            <!-- <form action="visualizar.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button>
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </form> -->

                            <form action="editar-categoria.php" method="GET">
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
    </main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>