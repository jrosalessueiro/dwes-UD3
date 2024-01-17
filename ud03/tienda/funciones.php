<?php
function comprobaciones(array $fotos)
{
    //Las imagenes se guardaran en la carpeta uploads con los permisos adecuados
    $imgDataArray = [];

    foreach ($fotos['tmp_name'] as $key => $tmp_name) {
        // Verifica si se subió correctamente
        if ($fotos['error'][$key] === 0) {
            $name = $fotos["name"][$key];
            $size = $fotos["size"][$key];
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $target_dir = "uploads/";
            $target_file = $target_dir . $name;
         
            if (!file_exists($target_file)) {
                if (compruebaExtension($extension) && compruebaTamanho($size)) {
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
            echo "Error al subir la imagen: " . $fotos['error'][$key];
        }
    }

    return $imgDataArray;
}

function subirArchivo(array $fotoData): void
{
    move_uploaded_file($fotoData['tmpName'], $fotoData['targetFile']);
}

function compruebaExtension(string $tipo_fichero): bool
{
    $tiposPermitidos = ['png', 'jpg', 'jpeg', 'gif'];
    //Comprobamos si la extensión está dentro de las que se aceptan
    if (in_array(strtolower($tipo_fichero), $tiposPermitidos)) {
        return true;
    }

    echo "El tipo de fichero no es válido. Únicamente se acepta .jpg, .jpeg, .gif, o .png";
    return false;
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
