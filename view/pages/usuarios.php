<?php
    require_once __DIR__ . "\..\..\model\UsuarioModel.php";

    $usuarioModel = new UsuarioModel();
    $lista = $usuarioModel->listar();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $usuarioModel->excluir($id); 
    } 
?>
<?php require_once __DIR__ . '..\..\components\header.php'; ?>
    <div id="sucesso" class="toast sucesso">
        <i class="fa-regular fa-circle-check"></i>
        Operação realizada com sucesso!
    </div>
    <div id="erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
        Falha ao executar operação!<br>
        ! CPF pode já existir em outro usúario
    </div>
    <main>
        <h1>Usúarios</h1>
        <form action="editar-usuario.php" method="GET" class="btn-criar">
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

                            <form action="editar-usuario.php" method="GET" title="Editar">
                                <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                                <button>
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                            </form>

                            <form action="usuarios.php" method="POST" title="Excluir">
                                <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir esse usúario?')">
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