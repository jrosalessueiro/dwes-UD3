<?php

try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "donacion";

    $dsn = "mysql:host=$servername;dbname=$dbname";
    $dbh = new PDO($dsn, $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM donantes";

    //Preparación de la declaración (Statement):
    //prepare($query): Prepara la consulta SQL para su ejecución. Retorna un objeto PDOStatement, que representa una sentencia preparada.
    $stmt = $dbh->prepare($query);

    //Recuperación de los resultados:
    //$donantes: Es un array que almacenará todos los resultados de la consulta.
    //$stmt->fetchAll(PDO::FETCH_ASSOC): Método de PDOStatement que recupera todas las filas del conjunto de resultados como un array asociativo.
    // En este caso, se utilizó PDO::FETCH_ASSOC para obtener un array asociativo donde las claves son los nombres de las columnas.
    $donantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al registrar el donante: " . $e->getMessage();
}
?>

<!DOCTYPE html>

<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
    <title>Lista de Donantes</title>
</head>

<body>
    <h2>Lista de Donantes</h2>

    <table border="1">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Grupo Sanguíneo</th>
            <th>CP</th>
            <th>Teléfono</th>
        </tr>
        <?php foreach ($donantes as $donante) : ?>
            <tr>
                <td><?php echo $donante['Id']; ?></td>
                <td><?php echo $donante['Nombre']; ?></td>
                <td><?php echo $donante['Edad']; ?></td>
                <td><?php echo $donante['grupoSanguineo']; ?></td>
                <td><?php echo $donante['Codigo_Postal']; ?></td>
                <td><?php echo $donante['Telefono_Movil']; ?></td>
                <td>
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="eliminar" value="<?php echo $donante['Id']; ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>