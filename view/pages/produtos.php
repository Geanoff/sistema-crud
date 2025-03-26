<?php
    $produtos = [
        [
            'id' => '1',
            'nome' => 'iPhone 15',
            'descricao' => 'Smartphone com tela OLED de 6,1 polegadas e chip A17.',
            'categoria' => 'Eletrônicos',
            'preco' => 5999.00
        ],
        [
            'id' => '2',
            'nome' => 'Geladeira Samsung 520L',
            'descricao' => 'Geladeira de 520 litros com tecnologia de refrigeração no-frost.',
            'categoria' => 'Eletrodomésticos',
            'preco' => 3499.00
        ],
        [
            'id' => '3',
            'nome' => 'Tênis Nike Air Max',
            'descricao' => 'Tênis de corrida com amortecimento Air Max e design moderno.',
            'categoria' => 'Roupas e Acessórios',
            'preco' => 499.90
        ],
        [
            'id' => '4',
            'nome' => 'Base Líquida L’Oréal',
            'descricao' => 'Base líquida de alta cobertura com efeito matte e longa duração.',
            'categoria' => 'Beleza e Cuidados Pessoais',
            'preco' => 89.90
        ],
        [
            'id' => '5',
            'nome' => 'Multivitamínico One a Day',
            'descricao' => 'Suplemento diário para melhorar a saúde geral e aumentar a imunidade.',
            'categoria' => 'Saúde e Bem-estar',
            'preco' => 69.90
        ],
        [
            'id' => '6',
            'nome' => 'Cerveja Artesanal IPA',
            'descricao' => 'Cerveja artesanal com sabor intenso e amargor característico.',
            'categoria' => 'Alimentos e Bebidas',
            'preco' => 19.90
        ],
        [
            'id' => '7',
            'nome' => 'Sofá Retrátil 3 Lugares',
            'descricao' => 'Sofá retrátil e reclinável, ideal para conforto e elegância na sua sala.',
            'categoria' => 'Casa e Decoração',
            'preco' => 1599.00
        ],
        [
            'id' => '8',
            'nome' => 'Bicicleta MTB Aro 29',
            'descricao' => 'Bicicleta de mountain bike com suspensão dianteira e aro 29.',
            'categoria' => 'Esportes e Lazer',
            'preco' => 1899.00
        ],
        [
            'id' => '9',
            'nome' => 'Kit de Faróis LED para Carro',
            'descricao' => 'Kit completo de faróis LED para melhoria da visibilidade do seu veículo.',
            'categoria' => 'Automotivo',
            'preco' => 299.00
        ],
        [
            'id' => '10',
            'nome' => 'Jogo de Tabuleiro Catan',
            'descricao' => 'Jogo de estratégia onde os jogadores constroem e negociam recursos.',
            'categoria' => 'Brinquedos e Jogos',
            'preco' => 249.90
        ],
        [
            'id' => '11',
            'nome' => 'Caderno Universitário 10 Matérias',
            'descricao' => 'Caderno espiral com 10 matérias e capa personalizada.',
            'categoria' => 'Papelaria e Escritório',
            'preco' => 19.90
        ],
        [
            'id' => '12',
            'nome' => 'O Senhor dos Anéis - Edição Especial',
            'descricao' => 'Edição luxuosa com capa dura e ilustrações exclusivas do clássico de J.R.R. Tolkien.',
            'categoria' => 'Livros e Mídia',
            'preco' => 149.90
        ],
        [
            'id' => '13',
            'nome' => 'Violão Yamaha F310',
            'descricao' => 'Violão acústico de excelente qualidade, ideal para iniciantes.',
            'categoria' => 'Música e Instrumentos Musicais',
            'preco' => 799.00
        ],
        [
            'id' => '14',
            'nome' => 'Ração Pedigree Sabor Frango',
            'descricao' => 'Ração seca para cães, sabor frango e com nutrientes balanceados.',
            'categoria' => 'Pet Shop',
            'preco' => 59.90
        ],
        [
            'id' => '15',
            'nome' => 'Furadeira Bosch 600W',
            'descricao' => 'Furadeira elétrica com 600W de potência e velocidade variável.',
            'categoria' => 'Ferramentas e Construção',
            'preco' => 299.90
        ],
        [
            'id' => '16',
            'nome' => 'Relógio Casio G-Shock',
            'descricao' => 'Relógio digital e resistente a impactos, ideal para aventuras.',
            'categoria' => 'Relógios e Óculos',
            'preco' => 399.90
        ],
        [
            'id' => '17',
            'nome' => 'Kit Solar 200W',
            'descricao' => 'Painel solar de 200W com inversor e bateria para armazenamento.',
            'categoria' => 'Energia Solar e Sustentabilidade',
            'preco' => 2599.00
        ],
        [
            'id' => '18',
            'nome' => 'Câmera de Segurança Arlo Pro 4',
            'descricao' => 'Câmera de segurança sem fio com alta definição e visão noturna.',
            'categoria' => 'Segurança e Monitoramento',
            'preco' => 1299.00
        ],
        [
            'id' => '19',
            'nome' => 'Mala de Viagem Samsonite',
            'descricao' => 'Mala resistente e leve, com compartimentos para organização.',
            'categoria' => 'Viagem e Turismo',
            'preco' => 899.00
        ],
        [
            'id' => '20',
            'nome' => 'Curso de Marketing Digital',
            'descricao' => 'Curso online de marketing digital com módulos sobre SEO, Ads e redes sociais.',
            'categoria' => 'Serviços Digitais',
            'preco' => 499.00
        ]
    ];
    $produtosJson = json_encode($produtos);
?>

<?php require_once __DIR__ . '..\..\components\header.php'; ?>

    <main>
        <h1>Produtos</h1>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Preço</th>
            </thead>
            <tbody>
                <?php foreach ($produtos as $prod) { ?>
                    <tr>
                        <td><?php echo $prod['id'] ?></td>
                        <td><?php echo $prod['nome'] ?></td>
                        <td><?php echo $prod['descricao'] ?></td>
                        <td><?php echo $prod['categoria'] ?></td>
                        <td><?php echo $prod['preco'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="visualizar.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $filme['id'] ?>">
                                <button>
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </form>

                            <form action="cadastro.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $filme['id'] ?>">
                                <button>
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                            </form>

                            <form action="excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $filme['id'] ?>">
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