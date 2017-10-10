<?php
    class mesas{
        private $id;
        private $descricao;
        private $status;
        private $nfv;

        public function __construct($id=null, $descricao=null, $status=null, $nfv=null)
        {
            $this->id = $id;
            $this->descricao = $descricao;
            $this->status = $status;
            $this->nfv = $nfv;
        }
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getDescricao()
        {
            return $this->descricao;
        }
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }
        public function getStatus()
        {
            return $this->status;
        }
        public function setStatus($status)
        {
            $this->status = $status;
        }
        public function getNfv()
        {
            return $this->nfv;
        }
        public function setNfv($nfv)
        {
            $this->nfv = $nfv;
        }

    }