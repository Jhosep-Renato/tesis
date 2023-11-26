<?php 

    class DocenteModel 
    {
        public function traerCursos($mysqli, $codDocente) 
        {

            try {
                $stmt = $mysqli->prepare("SELECT * FROM curso WHERE codDocente = ?");
                $stmt->bind_param("s", $codDocente);
                $stmt->execute();

                $resultado = $stmt->get_result();

                $arrayCurso = $resultado->fetch_all(MYSQLI_ASSOC);

                $stmt->close();
                return $arrayCurso;
                
            } catch (Exception $e) {
                return null;

            } finally {
                $mysqli->close();
            }
        } 

        public function obtenerAlumnos($mysqli, $curso) 
        {   
            $sql = "CALL obtenerGrupo(?);";

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