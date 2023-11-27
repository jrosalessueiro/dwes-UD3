<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <p>Lista de usuarios con enlaces para borrar y editar</p>
    <?php

    include("lib/base_datos.php");
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    $sql = "SELECT id, nombre, apellido, edad, provincia FROM usuarios";
    // La siguiente línea de código ejecuta la consulta y coloca los datos resultantes en una variable llamada $resultado.
    $resultados = $conexion->query($sql);

    //la función num_rows()verifica si se devuelven más de cero filas
    if($resultados->num_rows > 0){
        echo '<table>';
    //Si se devuelven más de cero filas, la función fetch_assoc()coloca todos los resultados en una matriz asociativa que podemos recorrer. 
    //El bucle while() recorre el conjunto de resultados y genera los datos de las columnas id, nombre, apellidos, edad y provincia.
    while($row = $resultados->fetch_assoc()){
        echo " <tr> ";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nombre"]."</td>";
        echo "<td>".$row["apellido"]."</td>";
        echo "<td>".$row["edad"]."</td>";
        echo "<td>".$row["provincia"]."</td>";
        echo "<td> <a class='btn btn-primary' href=borrar.php?id=".$row['id'].">Borrar</a> </td>";
        echo "<td> <a class='btn btn-primary' href=editar.php?id=".$row['id'].">Editar</a> </td>";
        echo " </tr> ";
  }
  echo "</table>";
} else {
    echo "No hay resultados";
}
cerrar_conexion($conexion);

        //Obter conexión
        //Seleccionar bd
        //Consulta obtención dos usuarios (array)
        //Crear lista de usuarios
        //  - cada usuario mostra dous enlaces (editar e borrar)
        //  - editar.php?id=4
        //  - borrar.php?id=7
    ?>
    <!-- <table>
    <php if($resultados->num_rows > 0) { ?>
    <php while($row = $resultados->fetch_assoc()){ ?>
        <tr>
        <td><php echo $row["id"];?></td>
        echo "<td>".$row["nombre"]."</td>";
        echo "<td>".$row["apellido"]."</td>";
        echo "<td>".$row["edad"]."</td>";
        echo "<td>".$row["provincia"]."</td>";
        echo "<td> <a class='btn btn-primary' href=borrar.php?id=".$row['id'].">Borrar</a> </td>";
        echo "<td> <a class='btn btn-primary' href=editar.php?id=".$row['id'].">Editar</a> </td>";
        echo " </tr> ";
  }
} else {
    echo "No hay resultados";
}  
    </table>
-->
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>