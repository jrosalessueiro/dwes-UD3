<?php
include('Persona.php');
include('Usuario.php');
include('Administrador.php');

$usuario1 = new Usuario(1,'Bill','Gates');
$usuario2 = new Usuario(77,'Sheldon','Cooper');
$administrador1 = new Administrador(12,'Abel','Caballero');
$administrador2 = new Administrador(50,'Miguel Anxo','Lores');

echo $usuario1->accion();
echo $usuario2->accion();
echo $administrador1->accion();
echo $administrador2->accion();