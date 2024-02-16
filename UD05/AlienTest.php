<?php
include('Alien.php');

$alien1 = new Alien('Spok');
echo 'El alien '.$alien1->getNombre().' es el número '. $alien1->getNumberOfAliens().'.<br>';
$alien2 = new Alien('Obiwuan');
echo 'El alien '.$alien2->getNombre().' es el número '. $alien2->getNumberOfAliens().'.<br>';
$alien3 = new Alien('Dark Vader');
echo 'El alien '.$alien3->getNombre().' es el número '. $alien3->getNumberOfAliens().'.<br>';
$alien4 = new Alien('Cheewaka');
echo 'El alien '.$alien4->getNombre().' es el número '. $alien4->getNumberOfAliens().'.<br>';