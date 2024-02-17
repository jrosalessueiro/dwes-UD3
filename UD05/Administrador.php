<?php
include('Persona.php');

class Administrador extends Persona{
    
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
        echo 'Nombre: '. self::getNombre().'<br>';
        echo 'Apellidos: '. self::getApellidos().'<br>';
        echo 'Soy un Administrador.<br>';
    }
}
