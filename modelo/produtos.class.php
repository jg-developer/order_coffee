<?php

class produtos
{
    private $id;
    private $descritivo;
    private $valor;
    private $custo;
    private $categoria;

    public function __construct($id=null, $descritivo=null, $valor=null, $custo=null, $categoria=null)
    {
        $this->id = $id;
        $this->descritivo = $descritivo;
        $this->valor = $valor;
        $this->custo = $custo;
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescritivo()
    {
        return $this->descritivo;
    }

    /**
     * @param mixed $descritivo
     */
    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getCusto()
    {
        return $this->custo;
    }

    /**
     * @param mixed $custo
     */
    public function setCusto($custo)
    {
        $this->custo = $custo;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }


}