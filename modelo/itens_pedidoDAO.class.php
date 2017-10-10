<?php
    class itens_pedidoDAO extends conexao
    {
        function __construct()
        {
            parent:: __construct();
        }
        function inserir_itens($itens_pedido){
            $sql = "CALL novoItenPedido(?,?,?)";
            try{
                $f = $this->db->prepare($sql);
                $f->bindValue(1, $itens_pedido->getQuantidade());
                $f->bindValue(2, $itens_pedido->getProduto()->getId());
                $f->bindValue(3, $itens_pedido->getPedidos()->getId());

                $ret = $f->execute();

                $this->db = null;

                if(!$ret){
                    die("Erro ao inserir item no pedido");
                }
            }catch (Exception $e){
                die($e -> getMessage());
            }
        }
    }

