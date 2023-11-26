<?php 

    include 'UsuarioModel.php';
    include '../conexion.php';
    include 'CursoModel.php';

    class Docente extends Persona
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


        
    }
?>