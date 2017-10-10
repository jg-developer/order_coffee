<?php
class itens_pedido
{
    private $id;
    private $quantidade;
    private $valor;
    private $produto;
    private $pedidos;
    public function __construct($id=null, $quantidade=null, $valor=null, $produto=null, $pedidos=null)
    {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
        $this->produto = $produto;
        $this->pedidos = $pedidos;
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
     * @return mixed
     */

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
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
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param mixed $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    /**
     * @return null
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * @param null $pedido
     */
    public function setPedidos($pedidos)
    {
        $this->pedido = $pedidos;
    }



}