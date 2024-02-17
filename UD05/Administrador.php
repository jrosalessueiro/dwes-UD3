<?php

class Administrador extends Persona{
    public function __construct($id,$nombre,$apellidos){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }
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
    
    public function accion(){
        echo 'Nombre: '. $this->getNombre().'<br>';
        echo 'Apellidos: '. $this->getApellidos().'<br>';
        echo 'Soy un Administrador.<br><br>';
    }
}
