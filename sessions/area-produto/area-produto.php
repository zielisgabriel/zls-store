<?php
    session_start();
    include '../checkout/funcoes/quantidade-de-produtos.php';
    include '../../config.php';

    $total_produtos = total_produtos_carrinho();

    if(isset($_POST['sair'])){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $stmt = $connect->prepare("SELECT * FROM sapatos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $produto = $resultado->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area-produto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header id="header">
            <a href="../../index.php" class="voltar">
                <i class="fa-solid fa-angle-left"></i>
            </a>
            <nav>
                <?php
                    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
                    echo '<a href="../login/entrar/entrar.php"><i class="fa-solid fa-user"></i></a>';
                    } else {
                    echo '<div class="sair">';
                        echo '<div class="sairContent">';
                            echo '<div class="btnSair"><i class="fa-solid fa-user"></i></div>';
                            echo '<p class="btnSair">Olá</p>';
                        echo '</div>';
                        echo '<div class="barraSairContainer">';
                            echo '<div class="barraSairContent">';
                                echo '<form action="../../index.php" method="post">';
                                    echo '<button type="submit" name="sair">Sair</button>';
                                echo '</form>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<a href="../checkout/checkout.php"><i class="fa-solid fa-cart-shopping"></i>'. $total_produtos .'</a>';
                    }
                ?>
            </nav>
        </header>
        <div class="areaContainer">
            <div class="areaImage">
                <div class="image">
                    <?php
                    echo '<img src="../../assets/produtos/img/'. $produto['img'] .'" alt="">';
                    ?>
                </div>
            </div>
            <div class="areaDescricao">
                <form action="adicionar-no-carrinho.php" method="post">
                <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                <input type="hidden" name="nome" value="<?php echo $produto['nome']; ?>">
                <input type="hidden" name="img" value="<?php echo $produto['img']; ?>">
                <input type="hidden" name="preco" value="<?php echo $produto['preco']; ?>">

                    <div class="nome-preco">
                        <h3><?php echo $produto['nome']; ?></h3>
                        <h4><?php
                        echo 'R$ ' . number_format($produto['preco'], 2, ',', '.'); ?></h4>
                    </div>
                    <div class="tamanhosContainer">
                        <h4>Tamanhos:</h4>
                        <div class="tamanhos">
                            <input type="radio" name="tamanho" id="tamanho35" value="35" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho36" value="36" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho37" value="37" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho38" value="38" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho39" value="39" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho40" value="40" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho41" value="41" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho42" value="42" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho43" value="43" class="tamanho" required>
                            <input type="radio" name="tamanho" id="tamanho44" value="44" class="tamanho" required>

                            <label for="tamanho35" class="tamanhoLabel">35</label>
                            <label for="tamanho36" class="tamanhoLabel">36</label>
                            <label for="tamanho37" class="tamanhoLabel">37</label>
                            <label for="tamanho38" class="tamanhoLabel">38</label>
                            <label for="tamanho39" class="tamanhoLabel">39</label>
                            <label for="tamanho40" class="tamanhoLabel">40</label>
                            <label for="tamanho41" class="tamanhoLabel">41</label>
                            <label for="tamanho42" class="tamanhoLabel">42</label>
                            <label for="tamanho43" class="tamanhoLabel">43</label>
                            <label for="tamanho44" class="tamanhoLabel">44</label>
                        </div>
                    </div>

                    <div class="enviados">
                        <h4>Tipo de envio:</h4>
                        <div class="enviadoInput">
                            <input type="radio" name="enviado" id="enviadoNacional" value="Nacional" class="enviado" required>
                            <input type="radio" name="enviado" id="enviadoInternacional" value="Internacional" class="enviado" required>

                            <label for="enviadoNacional" class="enviadoLabel">Nacional</label>
                            <label for="enviadoInternacional" class="enviadoLabel">Internacional</label>
                        </div>
                    </div>
                    <div class="quantidade">
                        <h4>Quantidade:</h4>
                        <input type="number" name="quantidade" id="quantidade" min="1" step="1" value="1" required>
                    </div>
                    <div class="btnAdicionar">
                        <button type="submit" name="adicionar">Adicionar ao carrinho</button>
                    </div>
                </form>
                <div class="desc-avaliacaoContainer">
                    <div class="accordion">
                        <h5>Descrição:</h5>
                        <div class="descProduto">
                            <?php
                                echo $produto['descricao'];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="avaliacaoProduto"></div>
    </div>

    <script src="area-produto.js"></script>
</body>
</html>