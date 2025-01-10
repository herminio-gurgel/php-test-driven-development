<?php

namespace CDC\Loja\FluxoDeCaixa;

class GeradorDeNotaFiscal
{

    public function gera(Pedido $pedido)
    {
        return new NotaFiscal(
            $pedido->getCliente(),
            $pedido->getValorTotal() * 0.94,
            new \DateTime()
        );
    }
}