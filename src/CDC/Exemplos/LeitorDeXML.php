<?php

namespace CDC\Exemplos;

class LeitorDeXML implements Leitor
{

    private $stringDeTesteSomente = 'exemplo';
    private $contador = 0;

    public function leCaracteres()
    {
        return $this->stringDeTesteSomente[$this->contador];
    }

    public function temCaracteres()
    {
        if ($this->contador >= strlen($this->stringDeTesteSomente)) {
            $this->contador++;
            return true;
        }

        return false;
    }
}