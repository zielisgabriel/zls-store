<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$total_geral = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="checkout.css?v=2.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<title>Carrinho de Compras</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="../../index.php" class="voltar">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </header>
        <!--<h1>Seu Carrinho</h1>-->
        <div class="checkoutContainer">
            <div class="checkoutContent">
                <div class="areaProduto">
                    <?php if (!empty($_SESSION['carrinho'])): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="imageTabela"></th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th class="totalPorQuantidade">Total</th>
                                    <th class="tamanhoTabela">Tamanho</th>
                                    <th class="lixeiraTabela"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Inicializa o total
                                $total_geral = 0;
                                ?>
                                <?php foreach ($_SESSION['carrinho'] as $index => $produto): ?>
                                    <?php
                                        $total_produto = $produto['preco'] * $produto['quantidade'];
                                        $total_geral += $total_produto;
                                    ?>
                                    <tr>
                                        <td class="imageTabela"><img class="image" src="../../assets/produtos/img/<?php echo $produto['img']; ?>" alt=""></td>
                                        <td><?php echo $produto['nome']; ?></td>
                                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                                        <td>
                                            <form action="funcoes/alterar-quantidade.php" method="post">
                                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                                <div class="quantidade">
                                                    <input type="number" class="input-sem-setas" name="quantidade" value="<?php echo $produto['quantidade']; ?>" min="1">
                                                    <button type="submit" class="botaoAtualizar">Atualizar</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="totalPorQuantidade">R$ <?php echo number_format($total_produto, 2, ',', '.'); ?></td>
                                        <td class="tamanhoTabela"><?php echo $produto['tamanho']; ?></td>
                                        <td class="lixeiraTabela">
                                            <a href="funcoes/remover-produto.php?index=<?php echo $index; ?>"><i class="fa-solid fa-trash apagar"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                                
                    <?php else: ?>
                        <p>O carrinho está vazio.</p>
                    <?php endif; ?>
                    
                    <form action="funcoes/limpar-carrinho.php" method="post">
                        <button type="submit" name="limpar">Limpar Carrinho</button>
                    </form>
                </div>

                <div class="areaFinalizar">
                    <form action="pagamento-aceito/pagamento-aceito.php" method="post">
                        <h1>CHECKOUT</h1>
                        <div class="inputs">
                            <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                            <input type="email" name="email" id="email" placeholder="Email" required>
                            <input type="text" name="endereço" id="endereço" placeholder="Endereço" required>
                            <div class="inputFlex">
                                <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                                <input type="text" name="estado" id="estado" placeholder="Estado" required>
                            </div>
                            <input type="text" name="cep" id="cep" placeholder="CEP" required>
                            <input type="tel" name="telefone" id="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="total">
                            <h5>Total: R$ <?php echo number_format($total_geral, 2, ',', '.'); ?></h5>
                        </div>
                        <button type="submit" name="finalizar">Finalizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="checkout.js"></script>
</body>
</html>