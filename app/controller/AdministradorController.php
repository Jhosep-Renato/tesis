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

        public function obtenerCursos($mysqli, $codigo) 
        {
            $admin = new AdministradorModel();
            $cursos = $admin->obtenerCursos($mysqli, $codigo);

            if($cursos !== null) {
                echo json_encode($cursos);
            }
            else {
                echo json_encode(null);
            }
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
            $cursos = $admin->asignarCurso($mysqli, $curso);

            if($cursos !== null) {
                echo json_encode($cursos);
            }
            else {
                echo json_encode(null);
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
        else if(isset($dato['codigo'])) {
            $controller->obtenerCursos($mysqli, $dato['codigo']);
        }
        else if(isset($dato['curso'])) {
            $controller->obtenerCursos($mysqli, $dato['curso']);
        }
    }
    else {
       $controller->obtenerDatosCursos($mysqli);
    }

?>