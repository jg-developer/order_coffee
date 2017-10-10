<?php
    class mesasDAO extends conexao {
        function __construct($dbo=NULL)
        {
            parent:: __construct($dbo);
        }
        function addMesa($mesas)
        {
            $sql = "CALL addMesa(?)";
            try
            {
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $mesas->getStatus());
                $ret = $stmt->execute();
                $this->db = null;
                if(!$ret)
                {
                    die("Erro ao buscar mesa");
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
        function listarMesas(){
            $sql = "SELECT * FROM mesas";
            try {
                $f = $this->db->prepare($sql);
                $ret = $f->execute();
                $this->db = null;
                if (!$ret) {
                    die("Erro ao listar mesas");
                } else {
                    $retorno = $f->fetchAll(PDO::FETCH_OBJ);
                    return $retorno;
                }
            } catch (Exception $e) {
                die ($e->getMessage());
            }
        }
        function buscarUma($mesas)
        {
            $sql = "select * from mesas where id_mesa = ? ";
            try
            {
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $mesas->getId());
                $ret = $stmt->execute();
                $this->db = null;
                if(!$ret)
                {
                    die("Erro ao buscar mesa");
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