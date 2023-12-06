<?php 

    class AdministradorModel 
    {
        public function añadirDocente($mysqli, $docente) 
        {
            $codigo = null;
            try {
                $consulta = "CALL añadirDocente(?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $mysqli->prepare($consulta);

                $stmt->bind_param("ssssssss", $docente['nombre'], $docente['apellidoP'], $docente['apellidoM'], $docente['sexo'], $docente['telefono'], $docente['dni'], $docente['edad'], $docente['opcion']);

                if ($stmt->execute()) {
                    $stmt->bind_result($codigo);

                    // Obtener el resultado
                    $stmt->fetch();

                    // Cerrar el statement
                    $stmt->close();

                    return $codigo;
                } else {
                    return null;
                }
                
            } catch (Exception $e) {
                return null;

            } finally {
                $mysqli->close();
            }
        } 

        public function obtenerCursos($mysqli, $codigo)
        {
            try {
                $consulta = "CALL obtenerCurso(?)";

                $stmt = $mysqli->prepare($consulta);

                $stmt->bind_param("s", $codigo);

                $stmt->execute();

                $resultado = $stmt->get_result();

                
                $cursos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

                $stmt->close();
                return $cursos;
                
            } catch (Exception $e) {
                return null;

            } finally {
                $mysqli->close();
            }
        }


        public function obtenerDatosCursos($mysqli)
        {
            try {
                $consulta = "SELECT g.idGrupo, c.nombre, c.idHorario, h.codigoDocente FROM grupocurso AS g INNER JOIN curso AS c 
                ON g.codigoCurso = c.codigoCurso INNER JOIN horario AS h ON c.idHorario = h.idHorario";
                
                $stmt = $mysqli->prepare($consulta);
                $stmt->execute();
                $r = $stmt->get_result();

                $datos = mysqli_fetch_all($r, MYSQLI_ASSOC);

                $stmt->close();
                return $datos;
                                
            } catch (Exception $e) {
                return null;
            } finally {
                $mysqli->close();
            }
        }

        public function asignarCurso($mysqli, $curso)
        {
            
        }
    }
?>