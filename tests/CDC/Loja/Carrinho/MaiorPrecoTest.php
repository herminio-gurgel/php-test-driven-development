<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Carrinho\MaiorPreco;
use CDC\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class MaiorPrecoTest extends TestCase
{

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = new CarrinhoDeCompras();

        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);
        $this->assertEquals(0, $valor, null, 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhaCom1Elemento()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 1, 900.00));

        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(900.00, $valor, null, 0.00001);
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 1, 900.00));
        $carrinho->adiciona(new Produto("Fogão", 1, 1500.00));
        $carrinho->adiciona(new Produto("Máquina de lavar",
            1, 750.00));
        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);
        $this->assertEquals(1500.00, $valor, null, 0.0001);
    }

}