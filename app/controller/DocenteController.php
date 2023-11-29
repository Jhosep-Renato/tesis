<?php

    include '../model/DocenteModel.php';
    require('../conexion.php');

    class DocenteController 
    {
        public function obtenercursos($mysqli) 
        {
            session_start();

            $docente = new DocenteModel();

            $resu = $docente->obtenerCursos($mysqli, $_SESSION['codigo']);

            echo json_encode($resu);
            exit();
        }

        public function obtenerAlumnos($mysqli, $curso) 
        {
            $docente = new DocenteModel();

            $resu = $docente->obtenerAlumnos($mysqli, $curso);

            if($resu != null) {
                echo json_encode($resu);
            } else {
                echo null;
            }
            exit();
        }

        public function registrarAsistencia($mysqli, $json)
        {
            $docente = new DocenteModel();
            
            $validacion = $docente->registrarAsistencia($mysqli, $json);

            if($validacion) {
                echo "registrado";
            }
            else {
                echo 'incorrecto';
            }
        }

        public function obtenerAsistencia($mysqli, $dato, $fecha) 
        {   
            $docente = new DocenteModel();

            $validacion = $docente->obtenerAsistencia($mysqli, $dato, $fecha);
        
            if($validacion != null) {
                echo json_encode($validacion, JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(null);
            }
        }

        public function actualizarAsistencia($mysqli, $dato) 
        {
            $docente = new DocenteModel();

            $validacion = $docente->actualizarAsistencia($mysqli, $dato);
        
            if($validacion) {
                echo "actualizado";
            }
            else {
                echo 'error';
            }
        }
    }

    $controller = new DocenteController();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datos_json = file_get_contents("php://input");

        $dato = json_decode($datos_json, true);

        if(isset($dato['curso'])) {
            $controller->obtenerAsistencia($mysqli, $dato['curso'], null);
        }
        else if(isset($dato['asistencias']) && $dato['actualizar'] === null) {

            $controller->registrarAsistencia($mysqli, $dato['asistencias']);
        }
        else if(isset($dato['actualizar'])) {

            $controller->actualizarAsistencia($mysqli, $dato['asistencias']);
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $datos_json = file_get_contents("php://input");

        $dato = json_decode($datos_json, true);
        
        if(isset($_GET['fecha']) && isset($_GET['curso'])) {
            $controller->obtenerAsistencia($mysqli, $_GET['curso'], $_GET['fecha']);
        }
        else if(isset($_GET['curso'])) {
            $controller->obtenerAlumnos($mysqli, $_GET['curso']);
        }
        else if(isset($_GET['obtenerCursos'])) {
            $controller->obtenercursos($mysqli);
        }
        
    }
?>