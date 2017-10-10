<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 03/07/2017
 * Time: 01:18
 */
class perfil_usuarioDAO extends conexao
{

    function __construct($dbo=NULL)
    {
        parent:: __construct($dbo);
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM tipo_usuario";
        try
        {
            $stmt = $this->db->prepare($sql);
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar perfis");
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