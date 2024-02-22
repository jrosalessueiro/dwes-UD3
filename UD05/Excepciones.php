<?php
/*Defina una nueva clase de excepción llamada ExcepcionPropiaque extienda de Excepcion. No debe hacer nada más.

Crea una clase llamada ExcepcionPropiaClase, con un método estático testNumber que recibe un número.
Si el número es cero lanza una excepción del tipo ExcepcionPropia. 
La excepción no se atrapa dentro de esta clase.

Lance el método testNumber con diferentes valores, capturando las posibles excepciones. 
Haz esto en un archivo ExcepcionPropiaClaseTest.php*/

class ExcepcionPropiaClase{
    static function testNumber($number){
if($number === 0){
    throw new ExcepcionPropia('El número es igual a cero.');
}
    }
}