<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        include_once '../../../config.php';

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $result = mysqli_query($connect, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../../../index.php?accepted');
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: entrar.php');
        }

    } else {
        header('Location: entrar.php');
    }