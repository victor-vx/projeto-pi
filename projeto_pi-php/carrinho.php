<?php
session_start();

$produtos = [
    1 => ["nome" => "Creatina Max 300g", "preco" => 73.00],
    2 => ["nome" => "Whey Protein Max s:Chocolate 1kg", "preco" => 120.00],
    3 => ["nome" => "Pré Treino Growth", "preco" => 88.00]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Carrinho de Compras</h1>
        <a href="catalogo.php">Voltar ao Catálogo</a>
    </header>
    <main>
        <?php if (!empty($_SESSION['carrinho'])): ?>
            <ul>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['carrinho'] as $id => $quantidade): ?>
                    <?php
                    $produto = $produtos[$id];
                    $subtotal = $produto['preco'] * $quantidade;
                    $total += $subtotal;
                    ?>
                    <li>
                        <?= $produto['nome'] ?> - Quantidade: <?= $quantidade ?> - Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?>
                        <form action="processa_carrinho.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="acao" value="remover">Remover</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p>Total: R$ <?= number_format($total, 2, ',', '.') ?></p>
            <a href="checkout.php">Finalizar Compra</a>
        <?php else: ?>
            <p>O carrinho está vazio.</p>
        <?php endif; ?>
    </main>
</body>
</html>
