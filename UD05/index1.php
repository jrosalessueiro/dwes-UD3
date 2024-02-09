<?php
//Ejercicio 1. Contacto

//Crea una clase Contacto en un fichero Contacto.php, con las siguientes propiedades privadas: nombre, apellido y número de teléfono.
class Contacto
{
    private $nombre;
    private $apellido;
    private $numeroTelefono;

    //Define un constructor con 3 argumentos, que asigne los valores a las propiedades.
    function __construct($nombre, $apellido, $numeroTelefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numeroTelefono = $numeroTelefono;
    }

    //Agrega un método __destruct() a la clase, que muestra en pantalla el objeto que se está destruyendo.
    function __destruct()
    {
        echo "El contacto {$this->nombre} {$this->apellido} se está destruyendo.\n";
    }

    //Genera los getters y los setters para todas las propiedades y el método muestraInformacion() que imprima los valores de las propiedades.
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    function setNumeroTelefono($numeroTelefono)
    {
        $this->numeroTelefono = $numeroTelefono;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function getApellido()
    {
        return $this->apellido;
    }
    function getNumeroTelefono()
    {
        return $this->numeroTelefono;
    }
    function muestraInformacion()
    {
        echo 'Nombre: ' . $this->nombre . "\n";
        echo 'Apellido: ' . $this->apellido . "\n";
        echo 'Teléfono: ' . $this->numeroTelefono . "\n";
    }
}
?>