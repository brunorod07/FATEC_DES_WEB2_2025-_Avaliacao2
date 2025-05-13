<?php
require('classes/login.php');
require('classes/DB.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$produtos = $db->getAllProducts();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6c63ff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        main {
            padding: 40px;
            text-align: center;
        }

        table {
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6c63ff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #6c63ff;
        }
    </style>
</head>
<body>

<header>
    <h1>Lista de Produtos Cadastrados</h1>
</header>

<main>
    <?php if (count($produtos) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
            </tr>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= htmlspecialchars($produto['nome_produto']) ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($produto['descricao']) ?></td>
                    <td><?= htmlspecialchars($produto['categoria']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Nenhum produto cadastrado.</p>
    <?php endif; ?>

    <a href="home.php">← Voltar para o menu</a>
</main>

</body>
</html>
