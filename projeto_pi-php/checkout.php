<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Finalizar Compra</h1>
        <a href="catalogo.php">Voltar ao Catálogo</a>
    </header>
    <main>
        <h2>Resumo da Compra</h2>
        <ul>
            <?php
            session_start();
            $total = 0;
            foreach ($_SESSION['carrinho'] as $id => $quantidade) {
                $produto = $produtos[$id];
                $subtotal = $produto['preco'] * $quantidade;
                $total += $subtotal;
                echo "<li>{$produto['nome']} - Quantidade: $quantidade - Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "</li>";
            }
            ?>
        </ul>
        <p>Total: R$ <?= number_format($total, 2, ',', '.') ?></p>

        <h2>Escolha o Método de Pagamento</h2>
        <button onclick="exibirPix()">Pagar com Pix</button>
        <button onclick="exibirBoleto()">Pagar com Boleto</button>

        <div id="pix" style="display:none;">
            <h3>Pagamento via Pix</h3>
            <p>Escaneie o QR Code com seu app bancário:</p>
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/QR_Code_example.png" alt="QR Code Pix" style="width:150px;">
        </div>

        <div id="boleto" style="display:none;">
            <h3>Pagamento via Boleto</h3>
            <p>Geramos um boleto para o pagamento.</p>
            <button onclick="alert('Boleto gerado com sucesso!')">Gerar Boleto</button>
        </div>
    </main>

    <script>
        function exibirPix() {
            document.getElementById('pix').style.display = 'block';
            document.getElementById('boleto').style.display = 'none';
        }

        function exibirBoleto() {
            document.getElementById('boleto').style.display = 'block';
            document.getElementById('pix').style.display = 'none';
        }
    </script>
</body>
</html>
