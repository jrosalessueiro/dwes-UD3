<?

include('operario.php');
include('index2.php');

try {
    $operario1 = new Operario('Pepe', 1500, 'nocturno');
    //echo 'El operario ' . $operario1->getNombre() . ' tiene un salario de ' . $operario1->getSalario() . ' y su turno es ' . $operario1->getTurno().'<br>';
    echo var_dump($nombre);
} catch (InvalidArgumentException $e) {
    echo 'Error al crear el operario' . $e->getMessage();
}
?>