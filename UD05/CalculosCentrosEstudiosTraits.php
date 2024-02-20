<?php
/*Cree un Trait llamado CalculosCentroEstudios con las mismas funciones que la interfaz del ejercicio anterior.

Cree otro Trait denominado MostrarCalculos con dos funciones:

la función de saludo que muestra “Bienvenido al centro de cálculo”

la función showCalculusStudyCenter, que recibe el número de aprobados, suspensos y la calificación promedio y 
los muestra en la pantalla dándoles formato.

Crea cada Trait en un fichero diferente.

Cree una clase llamada NotasTrait que use los dos traits anteriores.
Escriba el código correspondiente para “probar” el código anterior en un fichero NotasTrait.php.*/

trait CalculosCentroEstudios{
    public function numeroDeAprobados(){
        foreach ($this->notas as $nota) {
            if ($nota >= 5) {
                $this->numAprobados++;
            }
        }
        return $this->numAprobados;
    }

    public function numeroDeSuspensos(){
        foreach ($this->notas as $nota) {
            if ($nota < 5) {
                $this->numSuspensos++;
            }
        }
        return $this->numSuspensos;
    }
    
    public function notaMedia(){
        foreach ($this->notas as $nota) {
            $this->num++;
        }
        $this->media=array_sum($this->notas)/$this->num;
        return number_format($this->media, 2, ',', ' ');
    }
}