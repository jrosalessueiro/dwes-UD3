<?php
function comprobaciones($foto)
{
    $target_dir = "uploads/";
    //Este es el archivo con su nombre
    $target_file = $target_dir . basename($_FILES["pphoto"]["name"]);
    $tipo_fichero = pathinfo($target_file, PATHINFO_EXTENSION);

    if (!file_exists($target_file)) {
        if ($_FILES["pphoto"]["size"] > 50000) {
            if ($tipo_fichero == "png" || $tipo_fichero == "jpg" || $tipo_fichero == "jpeg" || $tipo_fichero == "gif") {
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_file);
            } else {
                echo "El tipo de fichero no es válido. Únicamente se acepta .jpg, .jpeg, .gif, o .png";
            }
        } else {
            echo "El fichero es demasiado grande. Máximo 50MB.";
        }
    } else {
        echo "El fichero ya existe.";
    }
}
