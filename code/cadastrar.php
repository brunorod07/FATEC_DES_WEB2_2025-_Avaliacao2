<?php
require('classes/login.php');
require('classes/DB.php');

$validador = new Login();

$validador->verificar_logado();

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    $db->addProduct($nome, $preco, $descricao, $categoria);
    $mensagem = "Produto cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
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

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
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
    <h1>Cadastrar Produto</h1>
</header>

<main>
    <?php if (!empty($mensagem)) echo "<p class='msg'>$mensagem</p>"; ?>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do Produto" required>
        <input type="number" step="0.01" name="preco" placeholder="Preço" required>
        <textarea name="descricao" placeholder="Descrição" rows="3"></textarea>
        <input type="text" name="categoria" placeholder="Categoria" required>
        <button type="submit">Cadastrar</button>
    </form>

    <a href="home.php">← Voltar para o menu</a>
</main>

</body>
</html>
