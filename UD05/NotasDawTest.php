<?php
include('NotasDaw.php');

$q = [5,7,9,5,2,5,7,8,9,6,1,2,4,6,8,6,7,9];

$qualification = new NotasDaw($q);

echo 'Las notas de la clase son: '.$qualification->toString().'<br>';
echo 'Hay '.$qualification->numeroDeAprobados().' aprobados, '.$qualification->numeroDeSuspensos().' suspensos y la media de las notas es '.$qualification->notaMedia().'<br>';