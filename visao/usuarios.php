<?php
    require_once "auto.php";
    require_once "cabec.php";
    if ($_POST){
        $oper = $_POST["oper"];
        if ($oper == "E"){
            $usuario = new usuario($_POST["idu"]);
            $usuarioDAO = new usuarioDAO();
            $usuarioDAO->excluir($usuario);
        } else{
            $erro=0;
            if($_POST["nome"] == ""){
                echo "<script>alert('Preencha o nome do usuario')</script>";
                $erro++;
            }
            if($_POST["login"] == ""){
                echo "<script>alert('Preencha o login do usuario')</script>";
                $erro++;
            }
            if($_POST["senha"] == ""){
                echo "<script>alert('Preencha a senha do usuario')</script>";
                $erro++;
            }
            if($_POST["perfil"] == "0"){
                echo "<script>alert('Selecione um perfil para o usuário')</script>";
                $erro++;
            }
            if($erro == 0) {
                switch ($oper) {
                    case "I":
                        $perfil = new perfil_usuario($_POST["perfil"]);
                        $usuario = new usuario(null, $_POST["nome"], $_POST["login"], $_POST["senha"], $perfil);
                        $usuDAO = new usuarioDAO();
                        $usuDAO->inserir($usuario);
                        break;
                }
            }
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
    <script type="text/javascript" src="../js/init.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<header>
    <nav class="top-nav brown">
        <div class="container">
            <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
            <div class="nav-wrapper center"><a class="brand-logo center">Usuários</a></div>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav fixed z-depth-3">
        <li><div class="userView">
                <div class="background">
                    <img src="../img/bg.png">
                </div>
                <span class="white-text name">Order Coffee</span>
                <?php echo "<span class='white-text email'>Olá, $usuario</span>";?>
                <br>
            </div></li>
        <br><br><br><br><br>
        <?php require_once "menu.php";?>
    </ul>
</header>

<main>
    <div class="container">
        <div class="row">
            <table class="striped responsive-table col s12 m12 l12">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Perfil</th>
                    <th colspan = "2">Ações</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $usuarioDAO = new usuarioDAO();
                $listarUsuario = $usuarioDAO->buscarTodos();

                foreach ($listarUsuario as $dado) {
                    if($dado->id_u != $_SESSION["perfil"]) {
                        echo "<tr>";
                        echo "<td>$dado->usuario</td>";
                        echo "<td>$dado->login</td>";
                        echo "<td>$dado->perfil</td>";
                        echo "<td><a class='modal-trigger' onclick='u2(\"{$dado->senha}\")'  href='#ver' title='Ver Senha'/><i class=\"material-icons\">&#xE8F4;</i></a></td>";
                        echo "<td><a class='modal-trigger' onclick='u3({$dado->id_u})' href='#excluir'  title='Excluir'><i class='material-icons'>delete_sweep</i></a></td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
            <div id="excluir" class="modal col l4">
                <form method="POST" action="#">
                    <div class="modal-content">
                        <h4 class="red-text">Excluir Usuário?</h4>
                        <div class="row">
                            <div class="input-field col s12 l10">
                                <input id="oper" name="oper" type="hidden">
                                <input id="idu" name="idu" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Excluir" class="modal-action modal-close waves-effect waves-green btn-flat"/>
                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                    </div>
                </form>
            </div>
            <div id="ver" class="modal col l4">
                    <div class="modal-content">
                        <h4 class="red-text">Senha</h4>
                        <div class="row">
                            <div class="input-field col s12 l10">
                                <input disabled value="I am not editable" id="senhau" type="text" class="validate">
                                <label for="disabled">SENHA</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Ok</a>
                    </div>
            </div>
            <form id="inserir" class="modal" method="post" action="#">
                <div class="modal-content">
                    <div class="row">
                        <h4 class="col s12">Cadastrar Usuario</h4>
                        <div class="row">
                            <div class="input-field col s12 l10">
                                <input id="oper" name="oper" type="hidden">
                                <input id="idu" name="idu" type="hidden">
                                <input id="nome" name="nome" placeholder="" type="text">
                                <label for="nome">Nome:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l5 s12">
                                <input id="login" name="login" placeholder="" type="text">
                                <label for="login">Login:</label>
                            </div>
                            <div class="input-field col l5 s12">
                                <input id="senha" name="senha" placeholder="" type="text">
                                <label for="senha">Senha:</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col l5 s12 l6 input-field">
                                <select name="perfil" id="select" class="browser-default">
                                    <option value="0" id="0" selected>Selecione o perfil</option>
                                    <?php
                                    $perfilDAO = new perfil_usuarioDAO();
                                    $retorno = $perfilDAO->buscarTodos();
                                    foreach ($retorno as $dado) {
                                        echo "<option value=\"$dado->id_tipo_usuario\" id= \"$dado->id_tipo_usuario\" > $dado->tipo </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Salvar">
                    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                </div>
            </form>
            <div class="fixed-action-btn">
                <a class="modal-trigger btn-floating btn-large brown" onclick="u1()" href="#inserir">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
        </div>
</main>

<footer>

</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
</body>
</html>

