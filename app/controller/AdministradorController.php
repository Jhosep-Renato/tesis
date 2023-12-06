<?php

    include '../model/AdministradorModel.php';
    require('../conexion.php');

    class AdministradorController 
    {
        public function añadirDocente($mysqli, $docente) 
        {
            $admin = new AdministradorModel();
            $codigo = $admin->añadirDocente($mysqli, $docente);

            if($admin !== null) {
                echo json_encode($codigo);
            }
            else {
                echo json_encode('error en la ejecucion');
            }
            exit();
        }

        public function obtenerDatosCursos($mysqli) 
        {   
            $admin = new AdministradorModel();
            $datos = $admin->obtenerDatosCursos($mysqli);

            if($datos !== null) {
                echo json_encode($datos);
            }
            else {
                echo json_encode($datos);
            }
        }

        public function asignarCurso($mysqli, $curso) 
        {
            $admin = new AdministradorModel();
            $validacion = $admin->asignarCurso($mysqli, $curso);

            if($validacion) {
                echo json_encode(true);
            }
            else {
                echo json_encode(false);
            }
        }
    }

    $controller = new AdministradorController();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datos_json = file_get_contents("php://input");

        $dato = json_decode($datos_json, true);

        if(isset($dato['docente'])) {
            $controller->añadirDocente($mysqli, $dato['docente']);
        }
        else if(isset($dato['curso'])) {
            $controller->asignarCurso($mysqli, $dato['curso']);
        }
    }
    else {
       $controller->obtenerDatosCursos($mysqli);
    }

?>