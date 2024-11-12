<?php
session_start();

if (isset($_POST['index']) && isset($_POST['quantidade'])) {
    $index = $_POST['index'];
    $quantidade = (int)$_POST['quantidade'];

    // Atualiza a quantidade, se for maior que 0
    if ($quantidade > 0) {
        $_SESSION['carrinho'][$index]['quantidade'] = $quantidade;
    } else {
        // Remove o produto se a quantidade for 0
        unset($_SESSION['carrinho'][$index]);
    }

    header('Location: ../checkout.php');
    exit;
}
?>