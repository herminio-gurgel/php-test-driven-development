<?php


use CDC\Exemplos\Copiadora;
use PHPUnit\Framework\TestCase;

class CopiadoraTest extends TestCase
{
    public function testDeveLerEEnviarOConteudoLido()
    {
        $leitor = Mockery::mock("CDC\Exemplos\LeitorDeXML");
        $leitor->shouldReceive("temCaracteres")->andReturn(true, false);
        $leitor->shouldReceive("leCaracteres")->andReturn("andre");

        $escritor = Mockery::mock("CDC\Exemplos\EscritorPelaSerial");
        $escritor->shouldReceive("escreve")->andReturn("andre");

        $copiadora = new Copiadora($leitor, $escritor);
        $copiadora->copiar();
        $this->assertEquals("andre", $escritor->escreve("andre"));
    }
}
