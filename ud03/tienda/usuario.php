<?php
function usuario(){
session_start();

if(!isset($_SESSION['usuario'])){	
    header('Location: login.php');
}

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}else{
    $_SESSION['counter']++;
}
echo 'El usuario ha entrado '.$_SESSION['counter'].' veces.<br>';
}
?>