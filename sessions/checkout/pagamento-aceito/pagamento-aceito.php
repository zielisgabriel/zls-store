<?php
    session_start();

    if (isset($_POST['finalizar'])) {
        // Limpa o array do carrinho
        unset($_SESSION['carrinho']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagamento-aceito.css">
    <title>Pagamento Aceito</title>
</head>
<body>
    <div class="container">
        <div class="txt">
            <h1>Pagamento efetuado<br>com <strong>Sucesso</strong>!</h1>
            <a href="../../../index.php"><button>Voltar</button></a>
        </div>
    </div>

    <script src="pagamento-aceito.js"></script>
</body>
</html>