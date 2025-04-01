<?php
    require_once __DIR__ . "\..\..\model\UsuarioModel.php";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        $usuarioModel = new UsuarioModel();
        $lista = $usuarioModel->buscarId($id); 
    } 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data = $_POST['data'];
        $cpf = $_POST['cpf'];
        $usuarioModel = new UsuarioModel();
        $usuarioModel->editar($id, $nome, $email, $telefone, $data, $cpf); 
    } 
    

    require_once __DIR__ . '..\..\components\header.php';
?>

<main>
    <form action="editar-usuario.php" method="POST">
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
        <button class="btn">ALTERAR</button>
    </form>
</main>

<?php require_once __DIR__ . '\..\components\footer.php'; ?>