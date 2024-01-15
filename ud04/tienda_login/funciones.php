<?php
function comprobaciones($foto)
{
    //Las imagenes se guardaran en la carpeta uploads con los permisos adecuados
    $target_dir = "uploads/";
    //Este es el archivo con su nombre
    $target_file = $target_dir . basename($foto["name"]);
    //Esta es la extensión del fichero
    $tipo_fichero = pathinfo($target_file, PATHINFO_EXTENSION);

    //Vemos si existe e fichero
    if (!file_exists($target_file)) {
        if (compruebaExtension($tipo_fichero) == true && compruebaTamanho($_FILES["pphoto"]) == true) {
            move_uploaded_file($foto["tmp_name"], $target_file);
            return $target_file;
        } else {
            echo "El fichero ya existe.";
        }
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

function compruebaTamanho($foto)
{
    //Comprobamos si el tamaño es menor de 50MB
    if ($foto["size"] > 50000) {
        return true;
    } else {
        echo "El fichero es demasiado grande. Máximo 50MB.";
    }
}
