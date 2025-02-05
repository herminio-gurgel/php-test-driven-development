<?php

namespace CDC\Loja\FluxoDeCaixa;

class Pedido
{
    private $cliente;
    private $valorTotal;
    private $quantidadeItens;

    public function __construct($cliente, $valorTotal, $quantidadedeItens)
    {
        $this->cliente = $cliente;
        $this->valorTotal = $valorTotal;
        $this->quantidadeItens = $quantidadedeItens;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getQuantidadeItens()
    {
        return $this->quantidadeItens;
    }


}