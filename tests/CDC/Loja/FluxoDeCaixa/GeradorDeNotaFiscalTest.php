<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase,
    CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use Mockery;

class GeradorDeNotaFiscalTest extends TestCase
{

    public function testDeveGerarNFComValorDeImpostoDescontado()
    {
        $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFDao");
        $dao->shouldReceive("persiste")->andReturn(true);
        $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\SAP");
        $sap->shouldReceive("envia")->andReturn(true);

        $gerador = new GeradorDeNotaFiscal($dao, $sap);
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);
        $this->assertEquals(1000 * 0.94, $nf->getValor(), null, 0.00001);
    }

    public function testDevePersistirNFGerada()
    {
        $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFDao");
        $dao->shouldReceive("persiste")->andReturn(true);
        $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\SAP");
        $sap->shouldReceive("envia")->andReturn(true);

        $gerador = new GeradorDeNotaFiscal($dao, $sap);
        $pedido = new Pedido("Andre", 1000, 1);
        $nf = $gerador->gera($pedido);

        $this->assertTrue($dao->persiste());
        $this->assertNotNull($nf);
    }

    public function testDeveEnviarNFGeradaParaSAP()
    {
        $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFDao");
        $dao->shouldReceive("persiste")->andReturn(true);
        $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\SAP");
        $sap->shouldReceive("envia")->andReturn(true);
        $gerador = new GeradorDeNotaFiscal($dao, $sap);
        $pedido = new Pedido("Andre", 1000, 1);
        $nf = $gerador->gera($pedido);

        $this->assertTrue($sap->envia());
        $this->assertEquals(1000 * 0.94, $nf->getValor(), null, 0.00001);
    }

}
