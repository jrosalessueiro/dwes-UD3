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

function insertar_usuario($conexion,$nombre,$apellidos,$edad,$provincia){
           
        $sql = "INSERT INTO usuarios (nombre, apellido, edad, provincia)
        VALUES ('$nombre', '$apellidos', '$edad', '$provincia');";

        if($conexion->query($sql)){
            echo "Se ha creado un nuevo registro correctamente";
        }else{
            echo "Error a la hora de crear nuevo registro".$conexion->error;
        }
}

function cerrar_conexion($conexion){
    $conexion->close();
}

function borrar_usuario($conexion,$busqueda){
    
    $sql = "DELETE FROM usuarios WHERE id=$busqueda";
    if($conexion->query($sql)){
        echo "Se ha borrado un registro correctamente";
    }else{
        echo "Error a la hora de borrar un registro".$conexion->error;
    }
}

function obtener_usuario($conexion, $id){
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $resultado = $conexion->query($sql);
    return $resultado->fetch_assoc();
}

function actualizar_usuario($conexion,$id,$nombre,$apellidos,$edad,$provincia){
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellidos', edad='$edad', provincia='$provincia' WHERE id=$id";
    if($conexion->query($sql)){
        echo "Se ha actualizado un registro correctamente";
    }else{
        echo "Error a la hora de actualizar un registro".$conexion->error;
    }
}