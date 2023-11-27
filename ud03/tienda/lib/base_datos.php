<?php

function get_conexion(){
    //Código para establecer la conexión

    $conexion = new mysqli('db','root','test','dbname');
    // Comprobar la conexión
    $error =$conexion->connect_errno;
    if($error !=null){
        die("Fallo en la conexión: ".$conexion->connect_error. "con número". $error);
    }
    echo "Conexión correcta";
    //Cerrar la conexión
    $conexion-> close();

    //return $conexion;
}

function seleccionar_bd_tienda($conexion){
    $conexion->select_db("tienda");
}
function crear_bd_tienda(){
    //Código para creación de bd
}