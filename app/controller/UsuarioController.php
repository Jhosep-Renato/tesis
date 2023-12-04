<?php 

    require('../conexion.php');
    require('../model/UsuarioModel.php');

    class UsuarioController 
    {
        public function validarLogin($mysqli)
        {

            $user = $_POST['usuario'];
            $password = $_POST['password'];
            
            $usuarioModel = new UsuarioModel();

            $usuario = $usuarioModel->validarUsuario($mysqli, $user, $password);
            
            if($usuario != null) {
                session_start();
                $_SESSION['usuario'] = $usuario->getUsuario();
                $_SESSION['codigo'] = $usuario->getCodDocente();


                if($usuario->getTipo() != 1) {
                    header("Location: ../view/asistencia.php");
                } else {
                    header("Location: ../view/admin/inicioAdmin.php");
                }
                exit();
            } else {
                header("Location: ../../index.php");
            }
        }
    }

    $userController = new UsuarioController();
    $userController->validarLogin($mysqli);
    

                       
?>