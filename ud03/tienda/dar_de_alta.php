<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de usuario </h1>
    <?php
        /*if (isset($_POST["nombre"], $_POST["apellidos"])) {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['nombre'];

            $conexion = get_conextion();

            $conextion->executeQuery("INSERT INTO usuarios (nombre, apellidos) VALUES (" . $nombre . ", " . $apellidos . ")")
        }
        */
        //echo 'HOLA ' . ($_POST['fname'] ?? null) . '!';
        
        //Comprobar se veñen datos polo $_POST
        //Conexión
        //Seleccionar bd
        //Executar o INSERT
        //$connection->execute("INSERT INTO usuarios (nombre, apellidos) VALUES $POST[09")
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <form action="dar_de_alta.php" method="post">
    <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <input type="submit" value="Submit">
    </form>
    <!-- o "action" chama a dar_de_alta.php de xeito reflexivo-->
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>