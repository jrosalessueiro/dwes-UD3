<?php
session_start();

function get_conexion()
{
    $conexion = new mysqli('localhost', 'root', '');
    // Comprobar la conexión
    $error = $conexion->connect_errno;
    if ($error != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "con número" . $error);
    }

    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    $conexion->select_db("tienda");
}
function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if ($conexion->query($sql)) {
        echo "Base de datos creada correctamente.<br>";
    } else {
        echo "Error a la hora de crear la base de datos" . $conexion->error;
    }
}

function crear_tabla_usuario($conexion)
{
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50),
        email VARCHAR(50),
        contrasenha VARCHAR(50)
        )";

    if ($conexion->query($sql)) {
        echo "Tabla creada correctamente.<br>";
    } else {
        echo "Error a la hora de crear la tabla" . $conexion->error;
    }
}

function crear_tabla_productos($conexion)
{
    $sql = "CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        descripcion VARCHAR(100),
        precio FLOAT,
        unidades FLOAT,
        foto BLOB
        )";

    if ($conexion->query($sql)) {
        echo "Tabla creada correctamente.<br>";
    } else {
        echo "Error a la hora de crear la tabla" . $conexion->error;
    }
}

function insertar_usuario($conexion, $nombre, $apellidos, $edad, $provincia, $email, $contrasenha)
{

    $sql = "INSERT INTO usuarios (nombre, apellidos, edad, provincia, email, contrasenha)
        VALUES ('$nombre', '$apellidos', '$edad', '$provincia', '$email', '$contrasenha');";

    if ($conexion->query($sql)) {
        echo "Se ha creado un nuevo registro correctamente";
    } else {
        echo "Error a la hora de crear nuevo registro" . $conexion->error;
    }
}

function insertar_producto($conexion, $nombre, $descripcion, $precio, $unidades, $files)
{
    $filesData = comprobaciones($files);

    foreach ($filesData as $fileData) {
        subirArchivo($fileData);

        $fotoDataEscaped = mysqli_real_escape_string($conexion, $fileData['data']);

        $sql = "INSERT INTO productos (nombre,descripcion,precio,unidades,foto)
            VALUES ('$nombre', '$descripcion', '$precio', '$unidades','" . $fotoDataEscaped . "');";

        if ($conexion->query($sql)) {
            echo "Se ha creado un nuevo registro correctamente";
        } else {
            echo "Error a la hora de crear nuevo registro" . $conexion->error;
        }
    }
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}

function borrar_usuario($conexion, $busqueda)
{

    $sql = "DELETE FROM usuarios WHERE id=$busqueda";
    if ($conexion->query($sql)) {
        echo "Se ha borrado un registro correctamente";
    } else {
        echo "Error a la hora de borrar un registro" . $conexion->error;
    }
}

function obtener_usuario($conexion, $id)
{
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $resultado = $conexion->query($sql);
    return $resultado->fetch_assoc();
}

function actualizar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia, $email, $contrasenha)
{
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellidos', edad='$edad', provincia='$provincia', email='$email', contrasenha='$contrasenha'WHERE id=$id";
    if ($conexion->query($sql)) {
        echo "Se ha actualizado un registro correctamente";
    } else {
        echo "Error a la hora de actualizar un registro" . $conexion->error;
    }
}

function userbd($conexion, $pass)
{
    $sql = "SELECT email FROM usuarios WHERE contrasenha = '$pass'";
    $result = $conexion->query($sql);

    if ($result) {
        $fila = $result->fetch_assoc();

        if ($fila) {
            return $fila['email'];
        } else {
            return null;
        }
    } else {
        echo "ERROR. " . $conexion->error;
        return null;
    }
}

function passbd($conexion, $email)
{
    $sql = "SELECT contrasenha FROM usuarios WHERE email = '$email'";
    $result = $conexion->query($sql);

    if ($result) {
        $fila = $result->fetch_assoc();

        if ($fila) {
            return $fila['contrasenha'];
        } else {
            return null;
        }
    } else {
        echo "ERROR. " . $conexion->error;
        return null;
    }
}
