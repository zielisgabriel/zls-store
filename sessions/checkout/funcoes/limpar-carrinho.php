<?php
session_start();

if (isset($_POST['limpar'])) {
    // Limpa o array do carrinho
    unset($_SESSION['carrinho']);

    // Redireciona de volta para a página do carrinho
    header('Location: ../checkout.php');
    exit;
}
?>