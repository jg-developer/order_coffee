<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 12/06/2017
 * Time: 10:47
 */
    require_once "cabec.php";

    if($_POST){
        $usuario = new usuario(null, null, $_POST["login"], $_POST["senha"]);
        $usuDAO = new usuarioDAO();
        $ret = $usuDAO->autenticar($usuario);
        if(count($ret) > 0){
            $_SESSION["usuario"] = $ret[0]->nome;
            $_SESSION["id"] = $ret[0]->id_usuario;
            $_SESSION["perfil"] = $ret[0]->id_tipo_usuario;
            if($ret[0]->id_tipo_usuario != 3) {
                echo "<script>alert('Bem-Vindo');window.location.href='index.php';</script>";
            } else{
                echo "<script>alert('Bem-Vindo');window.location.href='cozinha.php';</script>";
            }
        }
        else {
            echo "<script>alert('Email/Senha incorretos');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Order Coffee</title>
    <!--Import Google Icon Font-->
    <link type="text/css" rel="stylesheet" href="../css/normalize.css"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/estilo.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="background-color: #EFEFEF;">
<div class="row">
    <div class="faixa card brown col s12 z-depth-0">
        <div class="input-field col s12">
            <br><br><br><br><br>
            <br><br><br><br><br>
            <br><br><br><br><br>
        </div>
    </div>
    <div class="teste">
        <form action="#" method="post">
        <div class="col s10 m6 l4 offset-s1 offset-m3 offset-l4 card z-depth-5">
            <div class="input-field col s12">
                <br>
            </div>
            <div class="col s8 offset-s2">
                <img class="responsive-img" src="../img/logo_marrom.png">
            </div>

                <div class="input-field col s12 brown-text">
                    <input id="user_name" type="text" class="validate" name="login" required>
                    <label for="user_name">Usuário</label>
                </div>

                <div class="input-field col s12">
                    <input id="password" type="password" class="validate  brown-text" name="senha" required>
                    <label for="password">Senha</label>
                </div>

                <div class="input-field col s12">
                    <br>
                </div>

                <div class="input-field col s12 right-align">
                    <button class="waves-effect waves-light btn brown" type="submmit">Login
                    </button>
                </div>
                <div class="input-field col s12">
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>
