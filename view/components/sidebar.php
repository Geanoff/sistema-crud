<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<aside>
    <nav>
        <ul>
            <li class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-home"></i><a href="home.php">Home</a>
            </li>
            <li class="<?= basename($_SERVER['PHP_SELF']) == 'categorias.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-list"></i><a href="categorias.php">Categorias</a>
            </li>
            <li class="<?= basename($_SERVER['PHP_SELF']) == 'produtos.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-layer-group"></i><a href="produtos.php">Produtos</a>
            </li>
            <li class="<?= basename($_SERVER['PHP_SELF']) == 'usuarios.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-users"></i><a href="usuarios.php">Usuários</a>
            </li>
        </ul>
    </nav>
</aside>