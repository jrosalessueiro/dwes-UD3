<?php
include('Excepciones.php');

$number = 0;

try {
    echo 'Number: ' . ExcepcionPropiaClase::testNumber($number);
} catch (Exception $e) {
    echo 'Excepción capturada: ', $e->getMessage(), "\n";
}
