<?php
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        header('Location: ../login/entrar/entrar.php');
    } else {

        if (isset($_POST['id']) && isset($_POST['tamanho']) && isset($_POST['img']) && isset($_POST['nome']) && isset($_POST['quantidade']) && isset($_POST['preco'])) {
            $id = $_POST['id'];
            $tamanho = $_POST['tamanho'];
            $img = $_POST['img'];
            $nome = $_POST['nome'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
        }

        // Inicializa o carrinho se ele não existir
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        $produto_existente = false;

        // Verifica se o produto já está no carrinho
        for ($i = 0; $i < count($_SESSION['carrinho']); $i++) {
            if ($_SESSION['carrinho'][$i]['id'] == $id) {
                // Atualiza a quantidade do produto existente
                $_SESSION['carrinho'][$i]['quantidade'] += $quantidade;
                $produto_existente = true;
                echo 'Produto atualizado no carrinho.';
                break;
            }
        }

        // Se o produto não existe, adiciona ao carrinho
        if (!$produto_existente) {
            $produto = [
                'id' => $id,
                'tamanho' => $tamanho,
                'img' => $img,
                'nome' => $nome,
                'preco' => $preco,
                'quantidade' => $quantidade
            ];
            $_SESSION['carrinho'][] = $produto;
            echo 'Produto adicionado ao carrinho.';
        }

        // Redireciona para a página do carrinho
        header('Location: ../checkout/checkout.php');
        exit;
    }