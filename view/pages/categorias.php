<?php
    require_once __DIR__ . "\..\..\model\CategoriaModel.php";

    $categoriaModel = new CategoriaModel();
    $lista = $categoriaModel->listar();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $categoriaModel->excluir($id); 
    } 
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
    <div id="erro" class="toast erro">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Falha ao executar operação!<br>
        ! Pode ter um produto com essa categoria
    </div>
<main>
        <h1>Categorias</h1>
        <form action="editar-categoria.php" method="GET" class="btn-criar">
            <input type="hidden" name="id" value="">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    NOVO
                </button>
        </form>
        <table class="table" id="table-categoria">
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

                            <form action="editar-categoria.php" method="GET" title="Editar">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button>
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                            </form>

                            <form action="categorias.php" method="POST" title="Excluir">
                                <input type="hidden" name="id" value="<?php echo $i->id ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir essa categoria?')">
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