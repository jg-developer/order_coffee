<?php

    class usuarioDAO extends conexao
    {
        function __construct($dbo=NULL)
        {
            parent:: __construct($dbo);
        }
        function autenticar($usuario)
        {
            $sql = "select * from usuarios where login = ? AND senha = ? ";
            try
            {
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $usuario->getLogin());
                $stmt->bindValue(2, $usuario->getSenha());
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
        }//autenticar

        //inserir usuarios
        function inserir($usuario){
            $sql = "CALL inserirUsusario(?,?,?,?)";
            try{
                $f = $this->db->prepare($sql);
                $f->bindValue(1, $usuario->getNome());
                $f->bindValue(2, $usuario->getLogin());
                $f->bindValue(3, $usuario->getSenha());
                $f->bindValue(4, $usuario->getPerfilUsuario()->getId());
                $ret = $f->execute();

                $this->db = null;

                if(!$ret){
                    die("Erro ao inserir usuario");
                }
            }catch (Exception $e){
                die($e -> getMessage());
            }
        }
        //listar todos os usuários
        public function buscarTodos()
        {
            $sql = "SELECT * FROM listar_usuarios";
            try
            {
                $stmt = $this->db->prepare($sql);
                $ret = $stmt->execute();
                $this->db = null;
                if(!$ret)
                {
                    die("Erro ao buscar usuarios");
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