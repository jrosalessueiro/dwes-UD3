<?php
trait MostrarCalculos{
    public function saludo(){
        echo 'Bienvenido al centro de cálculo';
    }

    public function showCalculusStudyCenter($aprobados,$suspensos,$media){
        echo 'Las notas de la clase son:<br>';
        echo 'Hay '.$aprobados.' aprobados, '.$suspensos.' suspensos y la media de las notas es '.$media.'<br>';
    }
}