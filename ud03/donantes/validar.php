<?php
$errores = array();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validación del campo 'nombre'
    $nombre = $_POST["nombre"];
    if (empty($_POST["nombre"])) {
        $errores[] = "El campo 'nombre' es obligatorio";
    }

    // Validación del campo 'apellidos'
    $apellidos = $_POST["apellidos"];
    if (empty($_POST["apellidos"])) {
        $errores[] = "El campo 'apellidos' es obligatorio";
    }

    // Validación del campo 'edad'
    $edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
    if ($edad === null || $edad === false || $edad < 18) {
        $errores[] = "La edad es obligatoria y debe ser un número entero mayor de 18 años";
    }

    // Validación del campo 'grupo sanguíneo'
    $gruposValidos = array("0+", "0-", "A+", "A-", "B+", "B-", "AB+", "AB-");
    $grupoSanguineo = $_POST["grupo_sanguineo"];
    if (empty($_POST["grupo_sanguineo"])) {
        $errores[] = "El campo 'grupo sanguíneo' es obligatorio";
    } else if (!in_array($grupoSanguineo, $gruposValidos)) {
        $errores[] = "El Grupo Sanguíneo no es un valor válido";
    }

    // Validación del campo 'codigo postal'
    $codigoPostal = $_POST["codigo_postal"];
    if (empty($_POST["codigo_postal"])) {
        $errores[] = "El campo 'codigo postal' es obligatorio";
    } else if (!preg_match("/^\d{5}$/", $codigoPostal)) {
        $errores[] = "El código postal debe tener 5 dígitos";
    }

    // Validación del campo 'telefono'
    $telefono = $_POST["telefono"];
    if (empty($_POST["telefono"])) {
        $errores[] = "El campo 'telefono' es obligatorio";
    } else if (!preg_match("/^6\d{8}$/", $telefono)) {
        $errores[] = "El teléfono debe tener 9 dígitos y empezar por 6";
    }

    // Si hay errores, no se introducen los datos en la tabla de la BBDD y se muestran errores
    if (!empty($errores)) {
        echo "Se han producido los siguientes errores al validar los datos introducidos: <br>";

        foreach ($errores as $error) {
            echo $error;
        }
    } else {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $dbname = "donacion";

            $dsn = "mysql:host=$servername;dbname=$dbname";
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Los VALUES son los "name" en el formulario de cada input.
            $query = "INSERT INTO donantes(Nombre, Apellidos, Edad, Grupo_Sanguineo, Codigo_Postal, Telefono_Movil) 
            VALUES(:nombre, :apellidos, :edad, :grupo_sanguineo, :cp, :telefono)";

            //Preparación de la declaración (Statement):
            //prepare($query): Prepara la consulta SQL para su ejecución. Retorna un objeto PDOStatement, que representa una sentencia preparada.
            $stmt = $dbh->prepare($query);

            //Asociación de parámetros:
            //bindParam(':nombre', $nombre): Asocia el marcador de posición :nombre con el valor de la variable $nombre.

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->bindParam(':grupo', $grupoSanguineo);
            $stmt->bindParam(':cp', $codigoPostal);
            $stmt->bindParam(':telefono', $telefono);

            //ejecución de la sentencia
            $stmt->execute();

            echo "Donante registrado correctamente.";
        } catch (PDOException $e) {
            echo "Error al registrar el donante: " . $e->getMessage();
        }
    }
}
?>