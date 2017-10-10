<?php
    class cozinhaDAO extends conexao {
        function __construct($dbo=NULL)
        {
            parent:: __construct($dbo);
        }

        function listarPedidos(){
            $sql = "SELECT * FROM listar_cozinha";
            try {
                $f = $this->db->prepare($sql);
                $ret = $f->execute();
                $this->db = null;
                if (!$ret) {
                    die("Erro ao listar pedidos");
                } else {
                    $retorno = $f->fetchAll(PDO::FETCH_OBJ);
                    return $retorno;
                }
            } catch (Exception $e) {
                die ($e->getMessage());
            }
        }
        function servirPedido($cozinha)
        {
            $sql = "CALL servirPedido(?)";
            try
            {
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $cozinha->getId());
                $ret = $stmt->execute();
                $this->db = null;
                if(!$ret)
                {
                    die("Erro ao servir pedido");
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