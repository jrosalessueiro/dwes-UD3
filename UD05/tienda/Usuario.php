<?php
/* Ejercicio 3. Aplicación Tienda
Recupera el ejercicio de “Tienda” realizado en anteriores unidades (copia el código) y genera una clase para los usuarios 
llamada Usuario en un fichero Usuario.php.

Modifica el registro de usuarios para que se haga a través de objetos de dicha clase.*/

class Usuario{

    protected $nombre;
    protected $apellidos;
    protected$edad;
    protected$provincia;
    protected$email;
    protected$contrasenha;

    public function __construct($nombre, $apellidos, $edad,$provincia,$email,$contrasenha){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->edad=$edad;
        $this->provincia=$provincia;
        $this->email=$email;
        $this->contrasenha=$contrasenha;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getProvincia(){
        return $this->provincia;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getContrasenha(){
        return $this->contrasenha;
    }
        
    }
