<?php
    if (isset($_POST['cadastrar'])) {
        include_once('../../../config.php');
    
        if ($connect->connect_error) {
            die("Erro de conexão: " . $connect->connect_error);
        }
    
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $result = mysqli_query($connect, "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')");

        header('Location: ../entrar/entrar.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar.css?v=2.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Cadastrar</title>
</head>
<body>
    <div class="container">
        <a href="../../../index.php" class="voltar">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <div class="loginContainer">
            <h1>Cadastrar</h1>
            <form action="cadastrar.php" method="post">
                <div class="inputs">
                    <p>Email:</p>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </div>
                <div class="inputs">
                    <p>Senha:</p>
                    <input type="password" name="senha" placeholder="Digite suas senha" required>
                </div>
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
            <p class="ntc">Tem uma conta? <a href="../entrar/entrar.php">Entrar</a></p>
        </div>
    </div>
    
    <script src="../script-login.js"></script>
</body>
</html>