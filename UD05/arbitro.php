<?php

class Arbitro extends Participante{
    protected $anosArbitraje;

    public function __construct($nombre,$edad,$anosArbitraje){
        parent::__construct($nombre,$edad);
        $this->anosArbitraje=$anosArbitraje;
    }

    public function getPosicion(){
        return $this->anosArbitraje;
    }
}