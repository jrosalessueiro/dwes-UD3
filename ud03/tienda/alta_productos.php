<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de producto </h1>
    <?php
    if (isset($_POST["pname"], $_POST["pdescription"], $_POST["pprice"], $_POST["punits"], $_FILES["pphoto"])) {
        $nombre = $_POST['pname'];
        $descripcion = $_POST['pdescription'];
        $precio = $_POST['pprice'];
        $unidades = $_POST['punits'];
        $fotos = $_FILES['pphoto'];

        include("lib/base_datos.php");
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);

        include("funciones.php");

        insertar_producto($conexion, $nombre, $descripcion, $precio, $unidades, $fotos);

        echo "Producto dado de alta correctamente.";
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta Producto</p>
    <form action="alta_productos.php" method="post" enctype="multipart/form-data">
        <label for="pname">Nombre:</label>
        <input type="text" id="pname" name="pname"><br><br>
        <label for="pdescription">Descripción:</label>
        <input type="text" id="pdescription" name="pdescription"><br><br>
        <label for="pprice">Precio:</label>
        <input type="text" id="pprice" name="pprice"><br><br>
        <label for="punits">Unidades:</label>
        <input type="text" id="punits" name="punits"><br><br>
        <label for="pphoto">Foto:</label>
        <input type="file" id="pphoto" name="pphoto[]" multiple><br><br>

        <input type="submit" value="Guardar">
    </form>
    <!-- o "action" chama a dar_de_alta.php de xeito reflexivo-->

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>