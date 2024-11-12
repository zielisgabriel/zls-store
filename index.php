<?php
    
    session_start();
    include 'config.php';
    include 'sessions/checkout/funcoes/quantidade-de-produtos.php';

    if(isset($_POST['sair'])){
        unset($_SESSION['carrinho']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }

    $total_produtos = total_produtos_carrinho();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?4.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>ZLS Store</title>
</head>
<body>
    <div class="container">
        <header id="header">
            <div class="titulo">
                <h1>ZLS</h1>
            </div>
            <nav>
                <?php
                    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
                    echo '<a href="sessions/login/entrar/entrar.php"><i class="fa-solid fa-user"></i></a>';
                    } else {
                    echo '<div class="sair">';
                        echo '<div class="sairContent">';
                            echo '<div class="btnSair"><i class="fa-solid fa-user"></i></div>';
                            echo '<p class="btnSair">Olá</p>';
                        echo '</div>';
                        echo '<div class="barraSairContainer">';
                            echo '<div class="barraSairContent">';
                                echo '<form action="index.php" method="post">';
                                    echo '<button type="submit" name="sair">Sair</button>';
                                echo '</form>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<a href="sessions/checkout/checkout.php"><i class="fa-solid fa-cart-shopping"></i>'. $total_produtos .'</a>';
                    }
                ?>
                
            </nav>
        </header>

        <div class="apresentacaoNike">
            <div class="apresentacaoNikeContent">
                <h1>JUST<br>DO IT.</h1>
                <img src="assets/images/apresentacoes/Logo_NIKE.svg.png" alt="">
                <div class="rolar">
                    <p>Rolagem</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
        </div>

        <div class="categoria">
            
            <a href="#casual" class="categoriaContent">
                <p>Casual</p>
                <img src="assets/images/categorias/casuais.jpg" alt="">
            </a>
            <a href="#esportivo" class="categoriaContent">
                <p>Esportivo</p>
                <img src="assets/images/categorias/esportivo.jpg" alt="">
            </a>
            <a href="#street" class="categoriaContent">
                <p>Street</p>
                <img src="assets/images/categorias/street.jpeg" alt="">
            </a>
        </div>

        <div class="categoriaContentItems casuais" id="casual">
            <h1>Casual</h1>
            <div class="lista listaCasual">
        
                <?php
                $sql = "SELECT id, img, nome, quantidade, categoria, descricao, preco  FROM sapatos WHERE categoria = 'casual' LIMIT 8";
                $resultado = $connect->query($sql);

                while($sapato = $resultado->fetch_assoc()){
                    


                    echo '<a href="sessions/area-produto/area-produto.php?id='. $sapato['id'] .'" class="item-link">';
                    echo '<div class="item">';

                    echo "<img src='assets/produtos/img/" . $sapato['img'] . "' alt='" . $sapato['nome'] . "'>";
                    echo '<div class="nome"><p>'. $sapato['nome'] .'</p></div>';
                    echo '<div class="preco"><p><span>R$ '. number_format($sapato['preco'], 2, ',', '.') .'</span></p></div>';

                    echo '</div>';
                    echo '</a>';
                }
                ?>
                
            </div>
        </div>

        <div class="categoriaContentItems esportivos" id="esportivo">
            <h1>Esportivo</h1>
            <div class="lista listaCasual">
        
                <?php
                $sql = "SELECT id, img, nome, quantidade, categoria, descricao, preco  FROM sapatos WHERE categoria = 'esportivo' LIMIT 8";
                $resultado = $connect->query($sql);
                
                while($sapato = $resultado->fetch_assoc()){
                    


                    echo '<a href="sessions/area-produto/area-produto.php?id='. $sapato['id'] .'" class="item-link">';
                    echo '<div class="item">';

                    echo "<img src='assets/produtos/img/" . $sapato['img'] . "' alt='" . $sapato['nome'] . "'>";
                    echo '<div class="nome">'. $sapato['nome'] .'</div>';
                    echo '<div class="preco">R$ '. number_format($sapato['preco'], 2, ',', '.') .'</div>';

                    echo '</div>';
                    echo '</a>';
                }
                ?>
                
            </div>
        </div>

        <div class="categoriaContentItems street" id="street">
            <h1>Street</h1>
            <div class="lista listaCasual">
        
                <?php
                $sql = "SELECT id, img, nome, quantidade, categoria, descricao, preco  FROM sapatos WHERE categoria = 'street' LIMIT 8";
                $resultado = $connect->query($sql);
                
                while($sapato = $resultado->fetch_assoc()){
                    


                    echo '<a href="sessions/area-produto/area-produto.php?id='. $sapato['id'] .'" class="item-link">';
                    echo '<div class="item">';

                    echo "<img src='assets/produtos/img/" . $sapato['img'] . "' alt='" . $sapato['nome'] . "'>";
                    echo '<div class="nome">'. $sapato['nome'] .'</div>';
                    echo '<div class="preco">R$ '. number_format($sapato['preco'], 2, ',', '.') .'</div>';

                    echo '</div>';
                    echo '</a>';
                }
                ?>
                
            </div>
        </div>

        <div class="apresentacaoNike final">
            <h1>APENAS<br>FAÇA.</h1>
            <img src="assets/images/apresentacoes/Logo_NIKE.svg.png" alt="">
            <div class="rolar">
                <p>Rolagem</p>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>

        <footer id="footer">
            <div class="txts contato">
                <h3>Contatos</h3>
                <h5>Email:</h5>
                <h6>abc12345@gmail.com</h6>
                <h5>Número:</h5>
                <h6>(85)91234-5678</h6>
            </div>
            
            <div class="txts participacao">
                <h3>Participações</h3>
                <h5>Desenvolvedor:</h5>
                <h6>José Gabriel Almeida Silveira</h6>
                <h5>Roteiristas:</h5>
                <h6>Nycolas Patrick Chagas Maia,</h6>
                <h6>Ruan Fernando da Silva</h6>
            </div>
            
            <div class="txts fontes">
                <h3>Copyright</h3>
                <h5>Fontes:</h5>
                <h6><a href="https://fontawesome.com">Font Awesome</a></h6>
            </div>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>