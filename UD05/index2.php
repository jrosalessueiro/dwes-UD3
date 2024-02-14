<?php
/*Ejercicio 2. Empleados
Dada la siguiente clase Empleado en un fichero Empleado.php.
*/

/*class Empleado {

    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre=$nombre;  
    }
    public function getNombre(){
        return $this->nombre;
    }
}*/

//Completa los siguientes apartados:

//Cada vez que se cree un empleado se debe aumentar la variable $numEmpleados.
//El construtor de la clase empleado asignará un salario de entrada y un nombre, que se pasarán como argumentos. El salario de entrada no podrá superar los 2000 euros.

class Empleado {
    //PROPIEDADES
    public $nombre;
    public $salario;
    static public $numEmpleados = 0;

    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }

    function __construct($nombre, $salario) {
        if ($salario <= 2000) {
            $this->salario = $salario;
            $this->nombre = $nombre;
            self::$numEmpleados++;
            echo 'El empleado ' . $nombre . ' ha sido guardado correctamente' . "<br>";
        } else {
            echo 'El salario no puede ser superior a 2.000€.El empleado ' . $nombre . ' lo ha superado' . "<br>";
        }
    }

    //Crea un método getSalario() que devuelva el salario del objecto que lo llame.

    public function getSalario(){
        echo 'El salario de ' . $this->nombre . ' es: ' . $this->salario . '€'.'<br>';
    }
}









/*Crea una clase Operario en un fichero Operario.php que sea clase hija de Empleado. Con las siguientes características:

Tendrá una propiedad privada “turno”.

Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.

Crear el setter para turno. Los valores para esta variable sólo pueden ser “diurno” o “nocturno”.

Crear objetos en un fichero EmpleadoTest.php y OperarioTest.php que permitan comprobar todos los apartados anteriores.*/
