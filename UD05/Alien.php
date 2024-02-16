<?php

/*Crea una clase Alien con un atributo llamado nombre y un constructor. Haz esto en un fichero llamado Alien.php.
Agregue un atributo estático numberOfAliens para que podamos saber la cantidad de objetos de esta clase que se han creado.
Cree un método getNumberOfAliens que devuelva esa información.
Cada vez que se crea un nuevo Alien se debe modificar numberOfAliens.
Escribe el código que crea varios objetos de Alien y muestra el valor devuelto por el método numberOfAliens.
 Haz esto en un fichero llamado AlienTest.php*/

class Alien{
    protected $nombre;
    static public $numberOfAliens =0;

    public function __construct($nombre){
        $this->nombre=$nombre;
        self::$numberOfAliens++;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getNumberOfAliens(){
        return self::$numberOfAliens;
    }

}