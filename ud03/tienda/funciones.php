<?php
function comprobaciones(array $files)
{
    //Las imagenes se guardaran en la carpeta uploads con los permisos adecuados
    $imgDataArray = [];

    foreach ($files['tmp_name'] as $key => $tmp_name) {
        // Verifica si se subió correctamente
        if ($files['error'][$key] === 0) {
            $name = $files["name"][$key];
            $size = $files["size"][$key];
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $target_dir = getTargetDir($extension);
            $target_file = $target_dir . $name;

            if (!file_exists($target_file)) {
                if (compruebaTamanho($size)) {
                    $imgDataArray[] = [
                        'data' => file_get_contents($tmp_name),
                        'tmpName' => $tmp_name,
                        'targetFile' => $target_file,
                        'name' => $name,
                        'size' => $size,
                    ];
                }
            } else {
                echo "El fichero YA existe.";
                continue;
            }
        } else {
            echo "Error al subir la imagen: " . $files['error'][$key];
        }
    }

    return $imgDataArray;
}

function subirArchivo(array $fileData): void
{
    move_uploaded_file($fileData['tmpName'], $fileData['targetFile']);
}

function getTargetDir(string $extension): string
{
    switch (strtolower($extension)) {
        case 'txt':
        case 'odt':
            return 'uploads/texto/';
        case 'jpg':
        case 'gif':
        case 'jpeg':
        case 'png':
            return 'uploads/imagenes/';
        case 'pdf':
            return 'uploads/pdf/';
        default:
            return 'uploads/otros/';
    }
}

function compruebaTamanho(int $size): bool
{
    // Comprobamos si el tamaño es mayor de 50MB.
    if ($size > 50000) {
        echo "El fichero es demasiado grande. Máximo 50MB.";
        return false;
    }

    return true;
}

function usuario()
{
    session_start();

    if (!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 1;
    } else {
        $_SESSION['counter']++;
    }
    echo 'El usuario ha entrado ' . $_SESSION['counter'] . ' veces.<br>';
}

if (!isset($_SESSION['usuario'])) {
    
    header('Location: login.php');
    exit();
}

