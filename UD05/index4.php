<?php
/*Ejercicio 4. Participante.
Cree una clase Participante. Realiza los siguientes apartados:

Tendrá dos propiedades: nombre y edad. Cree sus constructores y métodos de acceso.

Crea 2 subclases: Jugador y Árbitro cada una en un fichero independiente y con el nombre adecuado. 
De los jugadores mantenemos su posición en el campo, y de los árbitros los años que lleva arbitrando.

Defina constructores y métodos de subclases (llamará al constructor de la clase principal).

Crea 2 objetos de cada subclase, haciendo las pruebas en los ficheros con los nombres adecuados, 
dando valores a sus propiedades y comprueba que funcionan métodos para cambiar nombre, edad, cargo y añosArbitraje.
 Muestra todas las propiedades de los 2 objetos.*/


class Participante{
    protected $nombre;
    protected $edad;

    public function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

public function getNombre(){
    return $this->nombre;
}

public function getEdad(){
    return $this->edad;
}

public function setEdad($edad){
    $this->edad=$edad;
}

public function setNombre($nombre){
    $this->nombre=$nombre;
}


}
