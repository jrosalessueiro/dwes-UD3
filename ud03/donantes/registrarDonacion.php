<!DOCTYPE html>
<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Donación</title>
</head>

<body>
    <form action="validarDonacion.php" method="post">Registrar</form>
    <label for="id">Id del donante</label>
    <select name="identidad" id="identidad"></select>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "donacion";

    //Creamos la conexión
    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión correcta";
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }

    //realizamos la consulta
    $consulta = "SELECT id FROM donantes"





    ?>


    <input type="text" required>

</body>

</html>