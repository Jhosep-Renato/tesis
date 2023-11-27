<?php 

    class DocenteModel 
    {
        public function obtenerCursos($mysqli, $codDocente) 
        {

            try {
                $consulta = "CALL obtenerCurso(?)";

                $stmt = $mysqli->prepare($consulta);

                $stmt->bind_param("s", $codDocente);

                $stmt->execute();

                $resultado = $stmt->get_result();

                
                $cursos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

                $stmt->close();
                echo json_encode($cursos);
                
            } catch (Exception $e) {
                return null;

            } finally {
                $mysqli->close();
            }
        } 

        public function obtenerAlumnos($mysqli, $curso) 
        {   
            $sql = "CALL obtenerAlumnos(?);";

            try {
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("s", $curso);
                $stmt->execute();

                $resultado = $stmt->get_result();

                if( $resultado->num_rows > 0 ) {
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }
                else {
                    return null;
                }

            } catch (Exception $e) {
                throw new Exception($mysqli->error);
            } finally {
                $mysqli->close();
            }
            
        }
    }

?>