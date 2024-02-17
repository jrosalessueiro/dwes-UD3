<?php
/*Cree una clase abstracta Persona en Persona.php:

Con las siguientes propiedades:
$id private (private).
$nombre protegida (protected).
$apellidos protegida (protected).
Tiene como métodos abstractos los getters, los setters y el constructor.
Tiene un método abstracto llamado accion().
Crea dos subclases cada una en el fichero adecuado:
    Usuario
    Administrador
Implementa el método accion() que muestre el nombre y los apellidos de la persona, así como una frase identificando 
si es un usuario o un administrador.

Genera los objetos que nos permitan identificar un buen funcionamiento de la aplicación en los ficheros adecuados.*/

abstract class Persona{
    private $id;
    protected $nombre;
    protected $apellidos;

    abstract public function getNombre();
    abstract public function getApellidos();
    abstract public function setNombre($nombre);
    abstract public function setApellidos($apellidos);
    abstract public function __construct($id,$nombre,$apellidos);
        
    abstract public function accion();

}