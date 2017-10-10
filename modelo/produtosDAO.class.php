<?php
class produtosDAO extends conexao
{

    public function __construct()
    {
        parent:: __construct();
    }

    function inserir($produtos){
        $sql = "CALL inserirProduto(?,?,?,?)";
        try{
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $produtos->getDescritivo());
            $f->bindValue(2, $produtos->getValor());
            $f->bindValue(3, $produtos->getCusto());
            $f->bindValue(4, $produtos->getCategoria()->getId());
            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die("Erro ao inserir produto");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }
    function alterar($produtos){
        $sql = "CALL alterarProduto(?,?,?,?,?)";
        try{
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $produtos->getId());
            $f->bindValue(2, $produtos->getDescritivo());
            $f->bindValue(3, $produtos->getValor());
            $f->bindValue(4, $produtos->getCusto());
            $f->bindValue(5, $produtos->getCategoria());
            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die("Erro ao alterar categoria");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }
    function excluir($produtos){
        $sql = "CALL excluirProduto(?)";
        try{
            $f = $this->db->prepare($sql);
            $f->bindValue(1, $produtos->getId());
            $ret = $f->execute();

            $this->db = null;

            if(!$ret){
                die("Erro ao excluir categoria");
            }
        }catch (Exception $e){
            die($e -> getMessage());
        }
    }

    function prod_cat($produtos)
    {
        $sql = "CALL listar_prod_cat(?)";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $produtos->getCategoria()->getId());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar produtos");
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

    public function buscarTodos()
    {
        $sql = "SELECT p.id_prod 'idp', p.descritivo 'produto', p.custo 'custo', p.valor 'valor', c.id_categoria 'idc',c.descricao 'categoria' FROM produtos p
                    INNER JOIN categoria c ON (p.id_categoria = c.id_categoria)";
        try
        {
            $stmt = $this->db->prepare($sql);
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar todos os produtos");
            }
            else
            {
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            }
        }//try
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }//buscarTodos
}