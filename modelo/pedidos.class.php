<?php
class pedidos
{
    private $id;
    private $usuario;
    private $data;
    private $hora;
    private $mesa;

    public function __construct($id=null, $usuario=null, $data=null, $hora=null, $mesa=null)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->data = $data;
        $this->hora = $hora;
        $this->mesa = $mesa;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getMesa()
    {
        return $this->mesa;
    }

    public function setMesa($mesa)
    {
        $this->mesa = $mesa;
    }
}