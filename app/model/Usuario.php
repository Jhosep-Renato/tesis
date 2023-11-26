<?php 

    class Usuario 
    {
        private int $idUsuario;
        private string $usuario;
        private string $password;
        private int $tipo;
        private string $codDocente;

        function __construct(int $idUsuario, string $usuario, string $password, int $tipo, string $codDocente)
        {
            $this->idUsuario = $idUsuario;
            $this->usuario =  $usuario;
            $this->password = $password;
            $this->tipo = $tipo;
            $this->codDocente = $codDocente;
        }

        public function getIdUsuario() 
        {
            return $this->idUsuario;
        }
        public function getUsuario() 
        {
            return $this->usuario;
        }
        public function getPassword() 
        {
            return $this->password;
        }
        public function getTipo() 
        {
            return $this->tipo;
        }
        public function getCodDocente() 
        {
            return $this->codDocente;
        }

    }

?>