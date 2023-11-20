<?php 

    class Curso 
    {
        private string $codCurso;
        private string $curso;
        private string $codDocente;

        public function getCodCuro(){
            return $this->codCurso;
        }

        public function getCurso(){
            return $this->curso;
        }

        public function getCodDocente(){
            return $this->codDocente;
        }

        public function setCodCuro($codCurso){
            $this->codCurso = $codCurso;
        }

        public function setCurso($curso){
            $this->curso = $curso;
        }

        public function setCodDocente($codDocente){
            $this->codDocente = $codDocente;
        }
    }
?>