<?php

function get_conexion(){
    $conexion = new mysqli('localhost','root','1234');
    // Comprobar la conexión
    $error = $conexion->connect_errno;
    if($error != null){
        die("Fallo en la conexión: ".$conexion->connect_error. "con número". $error);
    }
    
    return $conexion;
}

function seleccionar_bd_tienda($conexion){
    $conexion->select_db("tienda");

}
function crear_bd_tienda($conexion){
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if($conexion->query($sql)){
        echo "Base de datos creada correctamente";
    }else{
        echo "Error a la hora de crear la base de datos".$conexion->error;
    }
}

function crear_tabla_usuario($conexion){
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellido VARCHAR(100),
        edad INT,
        provincia VARCHAR(50)
        )";

    if($conexion->query($sql)){
        echo "Tabla creada correctamente";
    }else{
        echo "Error a la hora de crear la tabla".$conexion->error;
    }
    
}

function   insertar_usuario($conexion){
        $conexion = get_conexion();
        crear_bd_tienda($conexion);
        seleccionar_bd_tienda($conexion);
        crear_tabla_usuario($conexion);

        $sql = "INSERT INTO usuarios (nombre, apellidos, edad, provincia)
        VALUES ($nombre, $apellidos, $edad, $provincia);";

        if($conexion->query($sql)){
            echo "Se ha creado un nuevo registro correctamente";
        }else{
            echo "Error a la hora de crear nuevo registro".$conexion->error;
        }
        cerrar_conexion($conexion);
}

function cerrar_conexion($conexion){
    $conexion->close();
}
