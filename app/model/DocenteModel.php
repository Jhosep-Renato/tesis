<?php 
    require('../conexion.php');

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

        public function registrarAsistencia($mysqli, $asistencias) 
        {   
            session_start();

            $sql = "CALL registrarAsistencia(?, ?, ?, ?)";
            $exitos = true;

            try {
                
                $stmt = $mysqli->prepare($sql);
                
                foreach($asistencias as $a) {
                    $stmt->bind_param("ssss", $a['codigoAlumno'], 
                                        $a['estado'], $a['curso'], $_SESSION['codigo']);
                
                    if (!$stmt->execute()) {
                        $exitos = false;  // Marca como falso si hubo un fallo en alguna consulta
                    }
                }

                $stmt->close();

            } catch (mysqli_sql_exception $e) {
                throw new Exception("Error en la consulta ".$e->getMessage(), $e->getCode());
            } catch (Exception $e) {
                throw new Exception("Error general: " . $e->getMessage(), $e->getCode());
            } finally {
                $mysqli->close();
            }

            if ($exitos) {
                return $exitos;
            } else {
                return $exitos;
            }
        }


        public function obtenerAsistencia($mysqli, $curso)
        {
            date_default_timezone_set('America/Lima');
            $hoy = date("Y-m-d");
            
            $sql = "CALL obtenerAsistencia(?, ?);";

            try {

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ss", $curso, $hoy);
                $stmt->execute();

                $resultado = $stmt->get_result();

                if( $resultado->num_rows > 0 ) {
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }
                else {
                    return null;
                }

                $stmt->close();

            } catch (mysqli_sql_exception $e) {
                throw new Exception("Error en la consulta ".$e->getMessage(), $e->getCode());
            } catch (Exception $e) {
                throw new Exception("Error general: ". $e->getMessage(), $e->getCode());
            } finally {
                $mysqli->close();
            }
        }

        public function actualizarAsistencia($mysqli, $asistencias) {
            
            date_default_timezone_set('America/Lima');
            $hoy = date("Y-m-d");
            $exitos = true;

            $sql = "UPDATE asistencia SET estado = ? WHERE fechaRegistro = ? AND codigoAlumno = ? AND codigoCurso = ?";

            try {
                $stmt = $mysqli->prepare($sql);
                
                foreach($asistencias as $a) {
                    $stmt->bind_param("ssss", $a['estado'], $hoy, $a['codigoAlumno'],
                                        $a['curso']);
                
                    if (!$stmt->execute()) {
                        $exitos = false;  
                    }
                }

                $stmt->close();

            } catch (mysqli_sql_exception $e) {
                throw new Exception("Error en la consulta ".$e->getMessage(), $e->getCode());
            } catch (Exception $e) {
                throw new Exception("Error general: " . $e->getMessage(), $e->getCode());
            } finally {
                $mysqli->close();
            }

            if ($exitos) {
                return $exitos;
            } else {
                return $exitos;
            }
        }
    }

?>