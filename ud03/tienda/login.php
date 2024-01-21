<?php

function comprobar_usuario($email, $pass)
{
    include('lib/base_datos.php');
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    $user = getUsuario($conexion, $email, $pass);

    if ($user !== null) {
        session_start();
        $_SESSION['usuario'] = $user;
        header('Location:index.php');        
    } else {
        echo 'ERROR. La contraseña no coincide con la del usuario' .$user;
    }
}

//Comprobar si se reciben los datos
if (isset($_POST['email'], $_POST['contrasenha'])) {
    $user = $_POST['email'];
    $passwd = $_POST['contrasenha'];

    comprobar_usuario($user, $passwd);
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Login de tienda IES San Clemente</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
</head>

<body>
    <h2>Login de usuarios registrados:</h2><br>
    <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' method='post'>
        <label for='lemail'>email:</label>
        <input type='email' id='email' name='email'><br><br>
        <label for='lcontrasenha'>Contraseña:</label>
        <input type='password' id='contrasenha' name='contrasenha'><br><br>
        <input type='submit'>
    </form>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>

</body>

</html>