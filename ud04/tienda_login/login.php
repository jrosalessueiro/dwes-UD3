<?php
session_start();

function comprobar_usuario($nombre, $pass)
{
    include("lib/base_datos.php");
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $user = usuariobd($conexion, $nombre);
    $contrasenha = passbd($conexion, $pass);

    if ($nombre == $user && $pass == $contrasenha) {
        return true;
    } else {
        echo "La contraseña no coincide con la del usuario $nombre.";
    }
}

//Comprobar si se reciben los datos
if ($_SERVER["REQUEST METHOD"] == "POST") {
    $user = $_POST["usuario"];
    $pass = $_POST["password"];
    $user = comprobar_usuario($nombre, $pass);
    if (!$user) {
        $error = true;
    } else {
        $_SESSION["usuario"] = $user;
        //Redirigimos a index.php
        header('Location:index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login de tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h2>Login de usuarios registrados:</h2><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Usuario: <input type="text" id="usuario" name="usuario"><br><br>
        Contraseña: <input type="password" id="password" name="password"><br><br>
        <input type="submit">
    </form>
</body>

</html>