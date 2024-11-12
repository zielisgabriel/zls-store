<?php
    include_once '../../../config.php';

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Entrar</title>
</head>
<body>
    <div class="container">
        <a href="../../../index.php" class="voltar">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <div class="loginContainer">
            <h1>Entrar</h1>
            <form action="teste.php" method="post">
                <div class="inputs">
                    <p>Email:</p>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </div>
                <div class="inputs">
                    <p>Senha:</p>
                    <input type="password" name="senha" placeholder="Digite suas senha" required>
                </div>
                <button type="submit" name="submit">Entrar</button>
                <p class="ntc">Não tem uma conta? <a href="../cadastrar/cadastrar.php">Cadastra-se</a></p>
            </form>
        </div>
    </div>

    <script src="../script-login.js"></script>
</body>
</html>