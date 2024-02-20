<?php
include ('MostrarCalculosTrait.php');
class NotasTrait{
    use MostrarCalculos;
}

$d=new NotasTrait;

$d->showCalculusStudyCenter(5,6,7);
