<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "donacion";

//Creamos la conexión
try {
    //dsn = Data Source Name...en el cual se han de especificar el tipo de base de datos (mysql, mssql, sybase, sqlite, etc..), 
    //el host (localhost o el que sea) y el nombre de la base de datos (se puede especificar también el puerto).
    $dsn = "mysql:host=$servername;dbname=$dbname";

    //dbn = DataBase Handle (es el nombre de variable que se suele utilizar para el objeto PDO)
    $dbh = new PDO($dsn, $username, $password);

    //Para cerrar la conexion sería $dbh = null;

    // PDO maneja los errores en forma de excepciones, por lo que la conexión siempre ha de ir encerrada en un bloque try/catch. 
    //Se puede (y se debe) especificar el modo de error estableciendo el atributo error mode

    //PDO::ERRMODE_EXCEPTION. Además de establecer el código de error, PDO lanzará una excepción PDOException y establecerá 
    //sus propiedades para luego poder reflejar el error y su información. Este modo se emplea en la mayoría de situaciones, 
    //ya que permite manejar los errores y a la vez esconder datos que podrían ayudar a alguien a atacar tu aplicación.
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión correcta";

    //Creamos la Base de Datos si no existe
    $queryCreateDB = "CREATE DATABASE IF NOT EXISTS donacion";
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

    if ($connection->query($queryCreateTable2) === TRUE) {
        echo "Tabla 'historico' ha sido creada correctamente o ya existe. <br>";
    } else {
        echo "Error al crear la Tabla 'historico'." . $connection->error . "<br>";
    }

    $queryCreateTable3 = "CREATE TABLE IF NOT EXISTS administradores(Nombre_usuario VARCHAR(50) PRIMARY KEY, contrasena VARCHAR(200) NOT NULL)";

    if ($connection->query($queryCreateTable3) === TRUE) {
        echo "Tabla 'administradores' ha sido creada correctamente o ya existe. <br>";
    } else {
        echo "Error al crear la Tabla 'administradores'." . $connection->error . "<br>";
    }
} catch (PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
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
    <a class="btn btn-primary" href="registrarNuevoDonante.php" role="button" target="_blank">Registrar Nuevo Donante</a>
    <a class="btn btn-primary" href="mostrarListaDonantes.php" role="button" target="_blank">Mostrar lista de mostrarListaDonantes</a>
    <a class="btn btn-primary" href="registrarDonacion.php" role="button" target="_blank">Registrar Nueva Donación</a>
    <a class="btn btn-primary" href="eliminarDonante.php" role="button" target="_blank">Eliminar Donante</a>
    <a class="btn btn-primary" href="mostrarListaDonaciones.php" role="button" target="_blank">Mostrar lista de Donaciones</a>
    <a class="btn btn-primary" href="buscarDonante.php" role="button" target="_blank">Buscar Donante</a>
    <a class="btn btn-primary" href="registrarNuevoAdministrador.php" role="button" target="_blank">Registrar Nuevo Administrador</a>

    <footer>
        <p>
            <a href='index2.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>