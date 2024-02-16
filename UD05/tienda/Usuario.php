<?php

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
    
        
    }
