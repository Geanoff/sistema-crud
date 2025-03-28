<?php
    require_once __DIR__ . "\..\..\model\UsuarioModel.php";

    $usuarioModel = new UsuarioModel();
    $lista = $usuarioModel->listar();
?>
<?php require_once __DIR__ . '..\..\components\header.php'; ?>

    <main>
        <h1>Categorias</h1>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php foreach ($lista as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario->id ?></td>
                        <td><?php echo $usuario->nome ?></td>
                        <td><?php echo $usuario->email ?></td>
                        <td><?php echo $usuario->telefone ?></td>
                        <td><?php echo $usuario->data_nascimento ?></td>
                        <td><?php echo $usuario->cpf ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <!-- <form action="visualizar.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                                <button>
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </form> -->

                            <form action="cadastro.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                                <button>
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                            </form>

                            <form action="excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
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
</body>

</html>