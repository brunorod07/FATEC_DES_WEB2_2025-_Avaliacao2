<?php
require('classes/login.php');
require('classes/DB.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$mensagem = "";

// Se o formulario foi removido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto_id'])) {
    $id = $_POST['produto_id'];
    $db->deleteProduct($id);
    $mensagem = "Produto removido com sucesso!";
}

$produtos = $db->getAllProducts();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Remover Produto</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #6c63ff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #4e47d4;
        }

        .msg {
            color: green;
            margin-top: 20px;
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
    <h1>Remover Produto</h1>
</header>

<main>
    <?php if (!empty($mensagem)) echo "<p class='msg'>$mensagem</p>"; ?>

    <form method="POST">
        <label for="produto_id">Selecione um produto para remover:</label>
        <select name="produto_id" id="produto_id" required>
            <option value="" disabled selected>-- Escolha um produto --</option>
            <?php foreach ($produtos as $produto): ?>
                <option value="<?= $produto['id'] ?>">
                    <?= htmlspecialchars($produto['nome_produto']) ?> - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Remover</button>
    </form>

    <a href="home.php">← Voltar para o menu</a>
</main>

</body>
</html>
