<?php 

    class Usuario {

        protected string $nombre;
        protected string $apePaterno;
        protected string $apeMaterno;
        

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setApePaterno($apePaterno)
        {
            $this->apePaterno = $apePaterno;
        }

        public function setApeMaterno($apeMaterno)
        {
            $this->apeMaterno = $apeMaterno;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApeMaterno()
        {
            return $this->apeMaterno;
        }

        public function getApePaterno()
        {
            return $this->apePaterno;
        }
    }

?>