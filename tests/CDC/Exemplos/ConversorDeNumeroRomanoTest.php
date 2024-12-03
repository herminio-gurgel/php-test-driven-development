<?php

namespace CDC\Exemplos;

use PHPUnit\Framework\TestCase;

require "./vendor/autoload.php";

class ConversorDeNumeroRomanoTest extends TestCase
{
    public function testDeveEncontrarOSimboloI()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("I");
        $this->assertEquals(1, $numero);
    }

    public function testDeveEncontrarOSimboloV()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("V");
        $this->assertEquals(5, $numero);
    }

    public function testDeveEntenderOSimboloXXII()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXII");
        $this->assertEquals(22, $numero);
    }

    public function testDeveEntenderOSimboloIX()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("IX");
        $this->assertEquals(9, $numero);
    }

    public function testDeveEntenderOSimboloXXIV()
    {
        $romano = new ConversorDeNumeroRomano();
        $numero = $romano->converte("XXIV");
        $this->assertEquals(24, $numero);
    }

}