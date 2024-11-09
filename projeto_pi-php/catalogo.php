<?php
session_start();

$produtos = [
    ["id" => 1, "nome" => "Creatina Max 300g", "preco" => 73.00, "imagem" => "https://cdn.awsli.com.br/600x450/968/968066/produto/36982274/creatina-max-titanium-300g-wokp9u5c7m.png"],
    ["id" => 2, "nome" => "Whey Protein Max s:Chocolate 1kg", "preco" => 126.00, "imagem" => "https://www.jauserve.com.br/dw/image/v2/BFJL_PRD/on/demandware.static/-/Sites-jauserve-master/default/dw9fe43cef/7898944774254.png?sw=1800"],
    ["id" => 3, "nome" => "Pré Treino Growth", "preco" => 88.00, "imagem" => "https://www.gsuplementos.com.br/upload/produto/layout/1500/haze-hardcore-pre-workout-growth-v3.webp"],
    ["id" => 4, "nome" => "Pré Treino Insanity Growth s:Limão", "preco" => 95.00, "imagem" => "https://www.gsuplementos.com.br/upload/produto/layout/1069/insanity-300g-growth-supplements-v4.webp"]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Produtos</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 30px
        }
        .produto img{
            width: 100px;
        }
        .produto form{
            margin: 20px;
        }
        header{
            background-color: darkslategrey;
            margin-bottom: 5vh;
            padding: 30px;
        }
        header h1{
            color: white;
            margin-bottom: 2vh;
        }
        header a{
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        header a:hover{
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
