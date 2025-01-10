<?php

namespace CDC\Loja\FluxoDeCaixa;

class Pedido
{
    private $cliente;
    private $valorTotal;
    private $quantidadedeItens;

    public function __construct($cliente, $valorTotal, $quantidadedeItens)
    {
        $this->cliente = $cliente;
        $this->valorTotal = $valorTotal;
        $this->quantidadedeItens = $quantidadedeItens;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getQuantidadedeItens()
    {
        return $this->quantidadedeItens;
    }


}