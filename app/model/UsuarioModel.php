<?php 

    require('Usuario.php');

    class UsuarioModel 
    {
        public function validarUsuario($mysqli, $user, $password) 
        {


            try {
                $consulta = 'SELECT * FROM usuario WHERE usuario = ? AND password = ?';


                $stmt = $mysqli->prepare($consulta);


                $stmt->bind_param("ss", $user, $password);

                $stmt->execute();

                $resultado = $stmt->get_result();

                if ($fila = $resultado->fetch_assoc()) {
                    $usuario = new Usuario(
                        $fila['idUsuario'],
                        $fila['usuario'],
                        $fila['password'],
                        $fila['tipo'],
                        $fila['codigoDocente']
                    );
                    return $usuario;
                }
                
                return null;

            } catch (Exception $e) {
                return null;
            } finally {
                // Cerrar la conexión
                $stmt->close();
                $mysqli->close();
            }
        }
    }
?>