<?php
session_start();

$produtos = [
    ["id" => 1, "nome" => "Creatina Max 300g", "preco" => 73.00, "imagem" => "https://cdn.awsli.com.br/600x450/968/968066/produto/36982274/creatina-max-titanium-300g-wokp9u5c7m.png"],
    ["id" => 2, "nome" => "Whey Protein Max s:Chocolate 1kg", "preco" => 120.00, "imagem" => "https://www.jauserve.com.br/dw/image/v2/BFJL_PRD/on/demandware.static/-/Sites-jauserve-master/default/dw9fe43cef/7898944774254.png?sw=1800"],
    ["id" => 3, "nome" => "Pré Treino Growth", "preco" => 88.00, "imagem" => "https://www.gsuplementos.com.br/upload/produto/layout/1500/haze-hardcore-pre-workout-growth-v3.webp"],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Produtos</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 30px;
            background-image: url(https://www.embraplan.com.br/imagens/noticias/11b986fc-d5a6-49a8-ba84-7cbbe8b6f93e.jpg);
            background-repeat: no-repeat;
            background-position: center top;
            background-size: cover;
            color: black;
        }

        .catalogo {
            display: flex;
            flex-wrap: wrap;
            gap: 7vh;
            margin-top: 5vh;
            justify-content: center;
        }

        .produto {
            background-color: #ffffffb9;
            border-radius: 10px;
            border: none;
            padding: 40px;
            width: 200px;
        }

        .produto h2 {
            text-align: center;
        }

        .produto img {
            width: 90px;
            margin-left: 6vh;
        }

        .produto form {
            margin: 20px;
        }

        .produto button {
            padding: 10px;
            color: black;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            margin-top: 3vh;
            font-weight: bold;
        }

        .produto button:hover {
            cursor: pointer;
            background-color: black;
            color: white;
        }

        .produto p {
            color: green;
            text-align: center;
        }

        header {
            background-color: darkslategrey;
            margin-bottom: 5vh;
            padding: 30px;
            border-radius: 10px;
        }

        header h1 {
            color: white;
            margin-bottom: 2vh;
        }

        header a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        header a:hover {
            cursor: pointer;
            background-color: black;
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <h1>Catálogo de Produtos</h1>
        <a href="carrinho.php">Ver Carrinho</a>
    </header>
    <main class="catalogo">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                <h2><?= $produto['nome'] ?></h2>
                <p class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <form action="processa_carrinho.php" method="post">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">
                    <button type="submit" name="acao" value="adicionar">Adicionar ao Carrinho</button>
                </form>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>