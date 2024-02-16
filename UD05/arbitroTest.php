<?php
include('index4.php');
include('arbitro.php');

$arbitro1 = new Arbitro('Undiano',48,17);
$arbitro1->setNombre('Iturralde');
$arbitro1->setEdad(42);
$arbitro1->setAnosArbitraje(4);
echo 'El participante '.$arbitro1->getNombre().' tiene '.$arbitro1->getEdad().' años y lleva arbitrando '.$arbitro1->getAnosArbitraje().'<br>';

$arbitro2 = new Arbitro('Arminio',56,32);
$arbitro2->setNombre('Negreira');
$arbitro2->setEdad(78);
$arbitro2->setAnosArbitraje(54);
echo 'El participante '.$arbitro2->getNombre().' tiene '.$arbitro2->getEdad().' años y lleva arbitrando '.$arbitro2->getAnosArbitraje().'<br>';