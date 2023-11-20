<?php

    include '../model/DocenteModel.php';

    class DocenteController 
    {
        public function validarLogin($mysqli)
        {
            $user = $_POST['usuario'];
            $password = $_POST['password'];

            $docente = new Docente();

            $resu = $docente->validarDocenteBd($mysqli, $user, $password);

            if(isset($resu)) {
                session_start();
                $_SESSION['docente'] = $resu;
                $_SESSION['nombre'] = $user;
                
                header("Location: ../view/asistencia.php");
            } else {
                header("Location: ../../index.php");
            }
        }
    }

    $controller = new DocenteController();
    $controller->validarLogin($mysqli);
?>