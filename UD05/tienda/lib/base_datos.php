<?php

function get_conexion()
{
    $conexion = new mysqli('localhost', 'root', '');
    // Comprobar la conexión
    $error = $conexion->connect_errno;
    if ($error != null) {
        die('Fallo en la conexión: ' . $conexion->connect_error . 'con número' . $error);
    }

    return $conexion;
}

function seleccionar_bd_tiendaClass($conexion)
{
    $conexion->select_db('tiendaClass');
}
function crear_bd_tiendaClass($conexion)
{
    $sql = 'CREATE DATABASE IF NOT EXISTS tiendaClass';
    if ($conexion->query($sql)) {
        echo 'Base de datos creada correctamente.<br>';
    } else {
        echo 'Error a la hora de crear la base de datos.<br>' . $conexion->error;
    }
}

function crear_tabla_usuario($conexion)
{
    $sql = 'CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50),
        email VARCHAR(50),
        contrasenha VARCHAR(255)
        )';

    if ($conexion->query($sql)) {
        echo 'Tabla creada correctamente.<br>';
    } else {
        echo 'Error a la hora de crear la tabla' . $conexion->error;
    }
}

function crear_tabla_productos($conexion)
{
    $sql = 'CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        descripcion VARCHAR(100),
        precio FLOAT,
        unidades FLOAT,
        foto BLOB
        )';

    if ($conexion->query($sql)) {
        echo 'Tabla creada correctamente.<br>';
    } else {
        echo 'Error a la hora de crear la tabla' . $conexion->error;
    }
}

function insertar_usuario($conexion, $usuario)
{
    $query = 'INSERT INTO usuarios (nombre, apellidos, edad, provincia, email, contrasenha) VALUES (?,?,?,?,?,?)';
    $stmt = $conexion->prepare($query);

    $nombre = $usuario->getNombre();
    $apellidos = $usuario->getApellidos();
    $edad = $usuario->getEdad();
    $provincia = $usuario->getProvincia();
    $email = $usuario->getEmail();
    $contrasenha = $usuario->getContrasenha();

    $contrasenhaHash = md5($contrasenha);
    $stmt->bind_param('ssisss', $nombre, $apellidos, $edad, $provincia, $email, $contrasenhaHash);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Se ha creado un nuevo registro correctamente';
    } else {
        echo 'Error a la hora de crear nuevo registro' . $stmt->error;
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
            echo "Se ha creado un nuevo registro correctamente <br>";
        } else {
            echo "Error a la hora de crear nuevo registro <br>" . $conexion->error;
        }
    }
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}

function borrar_usuario($conexion, $busqueda)
{
    $sql = 'DELETE FROM usuarios WHERE id=' . $busqueda;
    if ($conexion->query($sql)) {
        echo 'Se ha borrado un registro correctamente';
    } else {
        echo 'Error a la hora de borrar un registro' . $conexion->error;
    }
}

function obtener_usuario($conexion, $id)
{
    $sql = 'SELECT * FROM usuarios WHERE id =' . $id;

    $resultado = $conexion->query($sql);
    return $resultado->fetch_assoc();
}

function actualizar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia, $email, $contrasenha)
{
    $query = 'UPDATE usuarios SET nombre = ?, apellidos = ?, edad = ?, provincia = ?, email = ?, contrasenha = ? WHERE id = ?';
    $stmt = $conexion->prepare($query);
    $contrasenhaHash = md5($contrasenha);
    $stmt->bind_param('ssisssi', $nombre, $apellidos, $edad, $provincia, $email, $contrasenhaHash, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Se ha actualizado un registro correctamente <br>";
    } else {
        echo "Error a la hora de actualizar un registro" . $stmt->error;
    }
}

function getUsuario($conexion, string $email, string $pass): ?array
{
    $query = 'SELECT * FROM usuarios WHERE email = ? AND contrasenha = ?';
    $stmt = $conexion->prepare($query);

    $passHash = md5($pass);
    $stmt->bind_param('ss', $email, $passHash);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        return $usuario;
    } else {
        echo "ERROR. " . $conexion->error;
        return null;
    }
}
