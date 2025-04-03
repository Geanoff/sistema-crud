<?php
    require_once __DIR__ . "\..\..\model\UsuarioModel.php";
    $usuarioModel = new UsuarioModel();

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $lista = $usuarioModel->buscarId($id); 
    } else {
        $lista = (object) [
            'id' => '',
            'nome' => '',
            'email' => '',
            'telefone' => '',
            'data' => '',
            'cpf' => '',
        ];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data = $_POST['data'];
        $cpf = $_POST['cpf'];
        
        if (!empty($id)) {
            $usuarioModel->editar($id, $nome, $email, $telefone, $data, $cpf); 
        } else {
            $usuarioModel->criar($nome, $email, $telefone, $data, $cpf);
        }

        header('Location: usuarios.php?mensagem=sucesso');
        exit();
    } 
    

    require_once __DIR__ . '..\..\components\header.php';
?>

<main>
    <form action="editar-usuario.php" method="POST">
        <h1><?php echo empty($lista->id) ? 'CRIAR NOVO USÚARIO' : 'EDITAR UM USÚARIO'; ?></h1>
        <input type="hidden" name="id" value="<?php echo $lista->id ?>">
        <div class="inputBox">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo $lista->nome ?>" required>
        </div>
        <div class="inputBox">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $lista->email ?>" required>
        </div>
        <div class="inputBox">
            <label for="telefone">Telefone</label>
            <input type="telefone" name="telefone" value="<?php echo $lista->telefone ?>" required>
        </div>
        <div class="inputBox">
            <label for="data">Data de Nascimento</label>
            <input type="date" name="data" value="<?php echo $lista->data_nascimento ?>" required>
        </div>
        <div class="inputBox">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo $lista->cpf ?>" maxlength="11" minlength="11" required>
        </div>
        <button class="btn"><?php echo empty($lista->id) ? 'CRIAR' : 'ALTERAR'; ?></button>
    </form>
</main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>