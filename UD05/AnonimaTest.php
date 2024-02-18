<?php
/*Utilizando una clase anónima crea diferentes objetos con los siguientes requisitos:

La clase tiene dos propiedades:
$base
$altura
La clase tiene dos métodos:
area(): devolve la (base * altura) / 2 .
perimetro(): devolve la 2 * base + 2 * altura .
Realiza todo esto en un fichero AnonimaTest.php.*/

$obj = new class(8,5){

    private $base;
    private $altura;

    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }

    public function area(){
        $area = $this->base*$this->altura/2;
        return $area;
    }

    public function perimetro(){
        $perimetro = 2*$this->base+2*$this->altura;
        return $perimetro;
    }

    public function getBase() {
        return $this->base;
    }

    public function getAltura() {
        return $this->altura;
    }
};

echo 'La base es '.$obj->getBase().' y la altura es '.$obj->getAltura().' por lo que el área es '.$obj->area().' y el perímetro es '.$obj->perimetro().'<br>';