<?php
$servername = "server";
$username = "sergas";
$password = "1234";

//Creamos la conexión
$connection = new mysqli($servername, $username, $password);

//Verificamos la conexión 
if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
}

//Creamos la Base de Datos si no existe
$queryCreateDB = "CREATE DATABASE IF NOT EXISTS $donacion";
if ($connection->query($queryCreateDB) === TRUE) {
    echo "Base de datos creada correctamente o ya existente . <br>";
} else {
    echo "Error al crear la Base de datos" . $connection->error . "<br>";
}

//Creamos las Tablas "donantes", "historico" y "administradores" si no existen
$queryCreateTable1 = "CREATE TABLE IF NOT EXISTS donantes(id INT PRIMARY KEY, 
Nombre VARCHAR(20) NOT NULL, Apellidos VARCHAR(50) NOT NULL, Edad INT NOT NULL, 
Grupo_Sanguineo VARCHAR(3) NOT NULL, Codigo_Postal VARCHAR(5) NOT NULL,Telefono_Movil VARCHAR(9) NOT NULL), 
CONSTRAINT edadRestriction CHECK (Edad > 18), CONSTRAINT grupoRestriction CHECK (EdGrupo_Sanguineo IN(O-,O+,A-,A+,B-,B+,AB-,AB+),
CONSTRAINT cpRestriction CHECK (LENGTH(Codigo_Postal)=5), CONSTRAINT tlfRestriction CHECK (LENGTH(Telefono_Movil)=9)";

if ($connection->query($queryCreateTable1) === TRUE) {
    echo "Tabla 'donantes' ha sido creada correctamente o ya existe. <br>";
} else {
    echo "Error al crear la Tabla 'donantes'." . $connection->error . "<br>";
}

$queryCreateTable2 = "CREATE TABLE IF NOT EXISTS historico(Donante INT, FOREIGN KEY(Donante) REFERENCES donantes(id), 
Fecha_Donacion DATE(10), Proxima_Donacion DATE(10) AS (DATE_ADD(Fecha_Donacion, INTERVAL 4 MONTH))";

if ($connection->query($queryCreateTable1) === TRUE) {
    echo "Tabla 'donantes' ha sido creada correctamente o ya existe. <br>";
} else {
    echo "Error al crear la Tabla 'donantes'." . $connection->error . "<br>";
}



?>

<!DOCTYPE html>
<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" width="device-width, initial-scale=1.0">
    <title>Aplicación Donación de Sangre</title>
</head>

<body>
    <a class="btn btn-primary" href="registrarNuevoDonante.php" role="button">Registrar Nuevo Donante</a>
    <a class="btn btn-primary" href="mostrarListaDonantes.php" role="button">Mostrar lista de mostrarListaDonantes</a>
    <a class="btn btn-primary" href="registrarDonacion.php" role="button">Registrar Nueva Donación</a>
    <a class="btn btn-primary" href="eliminarDonante.php" role="button">Eliminar Donante</a>
    <a class="btn btn-primary" href="mostrarListaDonaciones.php" role="button">Mostrar lista de Donaciones</a>
    <a class="btn btn-primary" href="buscarDonante.php" role="button">Buscar Donante</a>
    <a class="btn btn-primary" href="registrarNuevoAdministrador.php" role="button">Registrar Nuevo Administrador</a>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>