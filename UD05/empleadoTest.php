<?php
require_once('index2.php');

$empleado1 = new Empleado('Michael',1500);
echo ' Nombre: '. $empleado1->getNombre() . "<br>";
echo ' Número: ' . Empleado::$numEmpleados ."<br>";
echo $empleado1->getSalario()."<br><br>";

$empleado2 = new Empleado('John',152);
echo ' Nombre: '. $empleado2->getNombre() ."<br>";
echo ' Número: ' . Empleado::$numEmpleados ."<br>";
echo  $empleado2->getSalario()."<br><br>";

$empleado3 = new Empleado('Sarah',985);
echo ' Nombre: '. $empleado3->getNombre() . "<br>";
echo ' Número: ' . Empleado::$numEmpleados ."<br>";
echo $empleado3->getSalario()."<br><br>";
?>