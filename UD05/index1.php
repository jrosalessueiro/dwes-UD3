<?php
//Ejercicio 1. Contacto

//Crea una clase Contacto en un fichero Contacto.php, con las siguientes propiedades privadas: nombre, apellido y número de teléfono.

class Contacto
{
    private $nombre;
    private $apellido;
    private $numeroTelefono;


//Define un constructor con 3 argumentos, que asigne los valores a las propiedades.
function contacto($nombre, $apellido, $numeroTelefono){

}




    //Genera los getters y los setters para todas las propiedades y el método muestraInformacion() que imprima los valores de las propiedades.

    function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    function set_apellido($apellido){
        $this->apellido = $apellido;
    }
    function set_numeroTelefono($numeroTelefono){
        $this->numeroTelefono = $numeroTelefono;
    }
    function get_nombre($nombre){
        return $this->nombre;
    }
    function get_apellido($apellido){
        return $this->apellido;
    }
    function get_numeroTelefono($numeroTelefono){
        return $this->numeroTelefono;
    }
    function muestraInformacion(){
        echo Contacto->get_nombre();
    }
}


//Define un constructor con 3 argumentos, que asigne los valores a las propiedades.


//Crea 3 objetos de la clase Contacto en un fichero ContactoTest.php, asigna valores a todas sus propiedades y muéstrelos a continuación, primero con los métodos get() 
//y luego con el método muestraInformacion().

//Agrega un método __destruct() a la clase, que muestra en pantalla el objeto que se está destruyendo.