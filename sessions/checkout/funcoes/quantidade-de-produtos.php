<?php
    function total_produtos_carrinho() {
        if (!empty($_SESSION['carrinho'])) {
            $total = 0;
            foreach ($_SESSION['carrinho'] as $produto) {
                $total += $produto['quantidade'];
            }
            return $total;
        }
        return 0;
    }