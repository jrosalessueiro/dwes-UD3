<?php
require_once('index2.php');

$empleado1 = new Empleado('Michael',1500);
echo ' Nombre: '. $empleado1->getNombre() . ' Número: ' . Empleado::$numEmpleados ."\n";

$empleado2 = new Empleado('John',1200);
echo ' Nombre: '. $empleado2->getNombre() . ' Número: ' . Empleado::$numEmpleados ."\n";

$empleado3 = new Empleado('Sarah',985);
echo ' Nombre: '. $empleado3->getNombre() . ' Número: ' . Empleado::$numEmpleados ."\n";
?>