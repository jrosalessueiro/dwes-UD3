<?php
include('funciones.php');
usuario();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tienda IES San Clemente </title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
</head>

<body>
    <h1>Borrar usuario </h1>
    
    <?php

if (isset($_GET['id'])) {
    
    $busqueda = $_GET['id'];

    include('lib/base_datos.php');
    $conexion = get_conexion();
    seleccionar_bd_tiendaClass($conexion);
    borrar_usuario($conexion,$busqueda);
}
  
    ?>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'>
    </script>

    <p>Formulario de edición</p>
    <!-- o "action" chama a editar.php de xeito reflexivo-->
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>