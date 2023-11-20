<?php
    $servidor = "localhost";
    $bd = "asistencia";
    $usuario = "root";
    $contrasenia = "1234";

    try {
        $mysqli = new mysqli($servidor, $usuario, $contrasenia, $bd);
    } catch(Exception $ex) {
        echo $ex->getMessage();
    }
?>