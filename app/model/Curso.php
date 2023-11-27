<?php 

    class Curso 
    {
        private string $codigoCurso;
        private string $nombre;
        private string $fechaInicio;
        private string $fechaFinal;

        public function __construct(string $codigoCurso, string $nombre, string $fechaInicio, string $fechaFinal)
        {
            $this->codigoCurso = $codigoCurso;
            $this->nombre = $nombre;
            $this->fechaInicio = $fechaInicio;
            $this->fechaFinal = $fechaFinal;
        }

        public function getCodigoCurso(){
            return $this->codigoCurso;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getFechaInicio(){
            return $this->fechaInicio;
        }

        public function getFechaFinal(){
            return $this->fechaFinal;
        }
    }
?>