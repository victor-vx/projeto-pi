<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id = $_POST['id'] ?? null;
$quantidade = $_POST['quantidade'] ?? 1;
$acao = $_POST['acao'] ?? '';

if ($id && $quantidade && $acao === 'adicionar') {
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += $quantidade;
    } else {
        $_SESSION['carrinho'][$id] = $quantidade;
    }
} elseif ($id && $acao === 'remover') {
    unset($_SESSION['carrinho'][$id]);
}

header("Location: carrinho.php");
exit;
?>
