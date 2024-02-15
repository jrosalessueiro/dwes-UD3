<?php

/*Crea una clase Operario en un fichero Operario.php que sea clase hija de Empleado. Con las siguientes características:
Tendrá una propiedad privada “turno”.
Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.
Crear el setter para tusólo pueden ser “diurno. Los valores para esta variable rno” o “nocturno”.*/

class Operario extends Empleado{

private $turno;

    function __construct($nombre,$salario,$turno){
        parent::__construct($nombre,$salario);
        $this->setTurno($turno);
    }

    public function setTurno($turno){
        if($turno==="diurno"||$turno==="nocturno"){
            $this->turno=$turno;
        }else{
            throw new InvalidArgumentException("El turno debe ser 'diurno' o 'nocturno'.");
        }
    }

    public function getTurno(){
    return $this->turno;
    }
}
?>