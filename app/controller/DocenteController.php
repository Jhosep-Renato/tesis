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
            exit();
        }

        public function obtenercursos($mysqli) 
        {
            session_start();

            $docente = new Docente();

            $resu = $docente->traerCursos($mysqli, $_SESSION['docente']);

            echo json_encode($resu);
            exit();
        }
    }

    $controller = new DocenteController();

    if(isset($_POST['usuario'])) {
        $controller->validarLogin($mysqli);
    }

    if(isset($_GET['action'])) {
        $action = $_GET['action'];

        switch($action) {

            case 'obtenerCurso':  $controller->obtenercursos($mysqli);
                                break;
        }
    }
?>