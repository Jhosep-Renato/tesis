<?php

    $mysqli = new mysqli("localhost", "root", "1234", "asistencia");

    if($mysqli->connect_errno) {
        echo "Fallo al conectar a Mysql";
    }
    else {
        echo "correcto";
    }
?>