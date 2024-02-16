<?php
include('index4.php');
include('jugador.php');

$jugador1 = new Jugador('Cristiano',38,'Delantero');
$jugador1->setNombre('Jude');
$jugador1->setEdad(20);
$jugador1->setPosicion('Medio');
echo 'El participante '.$jugador1->getNombre().' tiene '.$jugador1->getEdad().' años y juega de '.$jugador1->getPosicion().'<br>';

$jugador2 = new Jugador('Lionel',36,'Delantero');
$jugador2->setNombre('Antonio');
$jugador2->setEdad(28);
$jugador2->setPosicion('Central');

echo 'El participante '.$jugador2->getNombre().' tiene '.$jugador2->getEdad().' años y juega de '.$jugador2->getPosicion().'<br>';