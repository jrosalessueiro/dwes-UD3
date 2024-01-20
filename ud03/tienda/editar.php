<?php
include('funciones.php');
usuario();
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
    <h1>Editar usuario </h1>
    <?php
    include("lib/base_datos.php");
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    if (isset($_POST['identity'], $_POST['fname'], $_POST['lname'], $_POST['age'], $_POST['state'], $_POST['email'], $_POST['contrasenha'])) {
        $id = $_POST['identity'];
        $nombre = $_POST['fname'];
        $apellidos = $_POST['lname'];
        $edad = $_POST['age'];
        $provincia = $_POST['state'];
        $email = $_POST['email'];
        $contrasenha = $_POST['contrasenha'];

        actualizar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia, $email, $contrasenha);
        $usuario = [
            'id' => $id,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'edad' => $edad,
            'provincia' => $provincia,
            'email' => $email,
            'contrasenha' => $contrasenha
        ];
    } else if (isset($_GET['id'])) {
        $usuario = obtener_usuario($conexion, $_GET['id']);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de edicion</p>
    <form action='editar.php' method='post'>
        <label for='fname'>Nombre:</label>
        <input type='text' id='fname' name='fname' value=<?php echo $usuario['nombre']; ?>><br><br>
        <label for='lname'>Apellidos:</label>
        <input type='text' id='lname' name='lname' value=<?php echo $usuario['apellidos']; ?>><br><br>
        <label for='age'>Edad:</label>
        <input type='text' id='age' name='age' value=<?php echo $usuario['edad']; ?>><br><br>
        <label for='state'>Provincia:</label>
        <input type='text' id='state' name='state' value=<?php echo $usuario['provincia']; ?>><br><br>
        <label for='email'>email:</label>
        <input type='text' id='email' name='email' value=<?php echo $usuario['email']; ?>><br><br>
        <label for='contrasenha'>Contraseña:</label>
        <input type='password' id='contrasenha' name='contrasenha' value=<?php echo $usuario['contrasenha']; ?>><br><br>
        <input type='hidden' id='identity' name='identity' value=<?php echo $usuario['id']; ?>>
        <input type='submit' value='Actualizar'>
    </form>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>