<?php
include('Excepciones.php');

$excep = new ExcepcionPropiaClase();
$number = 0;

try{
echo 'El resultado del '.$number. ' es '. ExcepcionPropiaClase::testNumber($number);
}catch(Exception $e){
    echo 'Excepción capturada: ', $e->getMessage(),"\n";
}