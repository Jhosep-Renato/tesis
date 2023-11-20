<?php 

    include 'UsuarioModel.php';
    include '../conexion.php';
    include 'CursoModel.php';

    class Docente extends Usuario
    {
        private string $codDocente;

        public function setCodDocente($codDocente) 
        {   
            $this->codDocente = $codDocente;            
        }

        public function getCodDocente()
        {
            return $this->codDocente;
        }

        public function validarDocenteBd($mysqli, $user, $password) 
        {
            $codDocente = null;

            try {
                $stmt = $mysqli->prepare("SELECT codDocente FROM docente WHERE nombre= ? AND contrasenia= ?");
                $stmt->bind_param("ss", $user, $password);
                $stmt->execute();
    
                $stmt->bind_result($codDocente);
    
                if ($stmt->fetch()) {
                    $this->setCodDocente($codDocente);

                    return $codDocente;
                } else {
                    return null;
                }
            } catch (Exception $e) {
                return null;
                
            } finally {
                $stmt->close();
                $mysqli->close();
            }
        }

        public function traerCursos($mysqli, $codDocente) 
        {

            try {
                $stmt = $mysqli->prepare("SELECT * FROM curso WHERE codDocente = ?");
                $stmt->bind_param("s", $codDocente);
                $stmt->execute();

                $resultado = $stmt->get_result();

                $arrayCurso = $resultado->fetch_all(MYSQLI_ASSOC);

                return $arrayCurso;
                
            } catch (Exception $e) {
                return null;

            } finally {
                $stmt->close();
                $mysqli->close();
            }
        } 
    }
?>