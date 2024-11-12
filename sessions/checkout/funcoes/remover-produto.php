<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    unset($_SESSION['carrinho'][$index]);
    header('Location: ../checkout.php');
    exit;
}
?>