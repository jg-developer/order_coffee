<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 05/06/2017
 * Time: 10:09
 */
class categoria
{
    private $id;
    private $descricao;

    /**
     * categoria constructor.
     * @param $id
     * @param $descricao
     */
    public function __construct($id=null, $descricao=null)
    {
        $this->id = $id;
        $this->descricao = $descricao;
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }




}