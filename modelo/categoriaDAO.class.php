<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 05/06/2017
 * Time: 10:13
 */
class categoriaDAO extends conexao
{
    function __construct()
    {
        parent:: __construct();
    }

    //buscar todas as categorias
    function buscarTodas()
    {
        $sql = "SELECT * FROM categoria";
        try {
            //preparar a frase sql para ser executada
            $f = $this->db->prepare($sql);
            //executar a frase no banco de dados
            $ret = $f->execute();
            $this->db = null;
            if (!$ret) {
                die("Erro ao buscar todas as categorias");
            } else {
                $retorno = $f->fetchAll(PDO::FETCH_OBJ);
                return $retorno;
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    function inserir($categoria){
        $sql = "CALL inserirCategoria(?)";
        try{
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $categoria->getDescricao());

            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die("Erro ao inserir categoria");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }
    function excluir($categoria){
        $sql = "DELETE FROM categoria WHERE id_categoria = ?";
        try{
            //preparar a frase sql para ser executada
            $f = $this->db->prepare($sql);
            //substituir os pontos de interrogação
            $f->bindValue(1, $categoria->getId());
            //executar a frase no banco de dados
            $ret = $f->execute();
            $this->db = null;
            if(!$ret){
                die("Erro ao excluir categoria");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }
    function editar($categoria){
        $sql = "UPDATE categoria SET descricao = ? where id_categoria = ?";
        try{
            //preparar a frase sql para ser executada
            $f = $this->db->prepare($sql);
            //substituir os pontos de interrogação
            $f->bindValue(1, $categoria->getDescricao());
            $f->bindValue(2, $categoria->getId());
            //executar a frase no banco de dados
            $ret = $f->execute();
            $this->db = null;
            if(!$ret){
                die("Erro ao alterar categoria");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }
}