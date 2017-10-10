<?php
class pedidosDAO extends conexao
{
    function __construct()
    {
        parent:: __construct();
    }

    function inserir($pedidos){
        $sql = "CALL novoPedido(?,?)";
        try{
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $pedidos->getUsuario()->getId());
            $f->bindValue(2, $pedidos->getMesa()->getId());
            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die("Erro ao criar pedido");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }

    function fecharPedido($pedidos){
        $sql = "CALL fecharPedido(?)";
        try{
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $pedidos->getMesa()->getId());
            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die("Erro ao fechar pedido");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }
    function listar($pedidos)
    {
        $sql = "CALL listar_itens_venda(?)";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $pedidos->getId());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro na autenticação do usuário");
            }
            else
            {
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }
}