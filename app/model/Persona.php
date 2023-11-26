<?php 

    class Persona 
    {   
        protected string $codigo;
        protected string $nombre;
        protected string $apePaterno;
        protected string $apeMaterno;
        protected string $sexo;
        protected string $telefono;
        protected string $dni;

        public function getCodigo() 
        {
            return $this->codigo;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function getApePaterno()
        {
            return $this->apePaterno;
        }
        public function getApeMaterno()
        {
            return $this->apeMaterno;
        }
        public function getSexo()
        {
            return $this->sexo;
        }
        public function getTelefono()
        {
            return $this->telefono;
        }
        public function getDni()
        {
            return $this->dni;
        }
    }


?>