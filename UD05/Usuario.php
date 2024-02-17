<?php
include('Persona.php');

class Usuario extends Persona{
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    public function __construct($id,$nombre,$apellidos){
        parent::__construct($id,$nombre,$apellidos);
    }
    public function accion(){
        echo 'Nombre: '. self::$nombre.'<br>';
        echo 'Apellidos: '. self::$apellidos.'<br>';
        echo 'Soy un Usuario.<br>';
    }
}
