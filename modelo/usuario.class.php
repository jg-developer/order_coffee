<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 12/06/2017
 * Time: 10:31
 */
class usuario
{
    private $id;
    private $nome;
    private $login;
    private $senha;
    private $perfil_usuario;
    function __construct($id=null, $nome=null, $login=null, $senha=null, $perfil_usuario=null){
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->perfil_usuario = $perfil_usuario;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getPerfilUsuario()
    {
        return $this->perfil_usuario;
    }

    public function setPerfilUsuario($perfil_usuario)
    {
        $this->perfil_usuario = $perfil_usuario;
    }


}