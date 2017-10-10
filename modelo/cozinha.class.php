<?php
    class cozinha{
       private $id;
       private $produto;
       private $quantidade;
       private $status;

        public function __construct($id=null, $produto=null, $quantidade=null, $status=null)
        {
            $this->id = $id;
            $this->produto = $produto;
            $this->quantidade = $quantidade;
            $this->status = $status;
        }

        /**
         * @return null
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param null $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return null
         */
        public function getProduto()
        {
            return $this->produto;
        }

        /**
         * @param null $produto
         */
        public function setProduto($produto)
        {
            $this->produto = $produto;
        }

        /**
         * @return null
         */
        public function getQuantidade()
        {
            return $this->quantidade;
        }

        /**
         * @param null $quantidade
         */
        public function setQuantidade($quantidade)
        {
            $this->quantidade = $quantidade;
        }

        /**
         * @return null
         */
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * @param null $status
         */
        public function setStatus($status)
        {
            $this->status = $status;
        }


    }