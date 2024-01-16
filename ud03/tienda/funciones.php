<?php
function comprobaciones(array $foto): string
{
    //Las imagenes se guardaran en la carpeta uploads con los permisos adecuados
    $target_dir = "uploads/";
    //Este es el archivo con su nombre
    $target_file = $target_dir . basename($foto["name"]);
    //Esta es la extensión del fichero
    $tipo_fichero = pathinfo($target_file, PATHINFO_EXTENSION);

    //Vemos si existe e fichero
    if (!file_exists($target_file)) {
        if (compruebaExtension($tipo_fichero) && compruebaTamanho($foto)) {
            //move_uploaded_file($foto["tmp_name"], $target_file);
            $imgData = file_get_contents($foto["tmp_name"]);
            return $imgData;
        }
    } else {
        echo "El fichero YA existe.";
    }
}

function compruebaExtension($tipo_fichero)
{
    //Comprobamos si la extensión está dentro de las que se aceptan
    if ($tipo_fichero == "png" || $tipo_fichero == "jpg" || $tipo_fichero == "jpeg" || $tipo_fichero == "gif") {
        return true;
    } else {
        echo "El tipo de fichero no es válido. Únicamente se acepta .jpg, .jpeg, .gif, o .png";
    }
}

function compruebaTamanho(array $foto)
{
    // Comprobamos si el tamaño es mayor de 50MB.
    if ($foto["size"] > 50000) {
        echo "El fichero es demasiado grande. Máximo 50MB.";
        return false;
    }
    
    return true;
}
