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
            try {
                $consulta = "CALL asignarCurso(?, ?, ?, ?, ?)";
                $stmt = $mysqli->prepare($consulta);

                $stmt->bind_param("sssss", $curso['docente'], $curso['curso'], $curso['fechaInicio'], $curso['fechaFinal'], $curso['grupo']);
                
                if ($stmt->execute()) {
                    // La ejecución fue exitosa, ahora verifica si se insertaron filas
                    if ($stmt->affected_rows > 0) {
                        $stmt->close();
                        return true;  // Se insertaron filas correctamente
                    } else {
                        $stmt->close();
                        return false;  // No se insertaron filas (puede ser un caso de inserción duplicada, etc.)
                    }
                } else {
                    $stmt->close();
                    return false;  // Error durante la ejecución
                }
                
            } catch (Exception $e) {
                return null;

            } finally {
                $mysqli->close();
            }
        }
    }
?>