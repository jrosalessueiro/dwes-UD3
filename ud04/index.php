<?php
// Iniciar la sesión
session_start();

// Verificar si se ha enviado un formulario de cambio de idioma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el idioma seleccionado del formulario
    $idiomaSeleccionado = $_POST["idioma"];

    // Establecer el idioma seleccionado en la sesión y en una cookie que expira en 30 días
    $_SESSION["idioma"] = $idiomaSeleccionado;
    setcookie("idioma", $idiomaSeleccionado, time() + (30 * 24 * 3600), "/");
} else {
    // Verificar si hay una cookie de idioma establecida
    if (isset($_COOKIE["idioma"])) {
        $idiomaSeleccionado = $_COOKIE["idioma"];
    } else {
        $idiomaSeleccionado = "es";
    }
}

// Función para obtener el mensaje de bienvenida en el idioma seleccionado
function obtenerMensajeBienvenida($idioma)
{
    switch ($idioma) {
        case "gl":
            return "¡Benvido á miña páxina!";
        case "es":
            return "¡Bienvenido a mi página!";
        case "en":
            return "Welcome to my web!";
        case "de":
            return "Wilkommen auf meiner Seite!";
        case "sl":
            return "Dobrodošli na moji strani!";
        default:
            return "¡Bienvenido a mi página!";
    }
}

// Obtener el mensaje de bienvenida en el idioma actual
$mensajeBienvenida = obtenerMensajeBienvenida($idiomaSeleccionado);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Multilingüe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
    </style>
</head>

<body>

    <h1>Selecciona tu idioma</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="idioma">Idioma:</label>
        <select id="idioma" name="idioma">
            <option value="gl" <?php if ($idiomaSeleccionado === "gl") echo "selected"; ?>>Galego</option>
            <option value="es" <?php if ($idiomaSeleccionado === "es") echo "selected"; ?>>Castellano</option>
            <option value="en" <?php if ($idiomaSeleccionado === "en") echo "selected"; ?>>English</option>
            <option value="de" <?php if ($idiomaSeleccionado === "de") echo "selected"; ?>>Deutsch</option>
            <option value="sl" <?php if ($idiomaSeleccionado === "sl") echo "selected"; ?>>Slovenščina</option>

        </select>

        <br><br>

        <input type="submit" value="Seleccionar idioma">
    </form>

    <br><br>

    <div id="mensajeBienvenida">
        <!-- Mostrar el mensaje de bienvenida en el idioma correspondiente -->
        <?php echo $mensajeBienvenida; ?>
    </div>

</body>

</html>