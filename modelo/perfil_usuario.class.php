<?php
    class perfil_usuario{

        private $id;
        private $tipo;

        public function __construct($id=null, $tipo=null)
        {
            $this->id = $id;
            $this->tipo = $tipo;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }


    }