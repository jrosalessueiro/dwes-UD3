<?php
/*Declara una interface llamada CalculosCentroEstudios, en un fichero independiete, con los siguientes métodos:

numeroDeAprobados, que devuelve el número de aprobados.
numeroDeSuspensos, que devuelve el número de suspensos.
notaMedia, que devuelve la nota media.

Crea una clase Notas en un fichero independiente:
Tendrá un atributo llamado notas. Este atributo será un array con diferentes notas enteras.
Tendrá una función abstracta toString(). Esta función pasará el array a string y lo devolverá. 
Crea por último, una clase denominada NotasDaw que hereda de la clase Notas e implementa CalculosCentroEstudos. 
Utiliza el nombre de fichero adecuado.

Escribe el código correspondente para “testear” la anterior clase en un fichero NotasDawTest.php:

Crea un objeto de la clase NotasDaw e invocar todos los métodos de esta clase mostrando por pantalla los resultados.*/


interface CalculosCentrosEstudios{
    public function numeroDeAprobados();
    public function numeroDeSuspensos();
    public function notaMedia();
}
