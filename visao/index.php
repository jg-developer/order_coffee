<?php
    require_once "auto.php";
    require_once "cabec.php";
    if($_POST){
        $mesa = new mesas(null,null,$_POST["sts"]);
        $mesaDAO = new mesasDAO();
        $mesaDAO->addMesa($mesa);
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

<body>
<header>
    <nav class="top-nav brown">
        <div class="container">
            <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
            <div class="nav-wrapper center"><a class="brand-logo center">Mesas</a></div>
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
    <form class="row" method="post" action="#">
        <?php
            $mesasDAO = new mesasDAO();
            $listarMesas = $mesasDAO->listarMesas();
            foreach ($listarMesas as $dado) {
                echo "<div class='card col s12 m4 l4 offset-l1 offset-m1'>";
                echo "<div class='card-content'>";
                echo "<span class='card-title grey-text text-darken-4'>{$dado->descricao}</span>";
                if ($dado->stats == "F"){
                    echo "<p>Mesa Livre</p>";
                }
                else{
                    echo "<p>Mesa Ocupada</p>";
                }
                echo "</div>";
                echo "<div class='card-action'>";
                if($dado->stats == "F"){
                    echo "<a href='mesa.php?oper=I&id={$dado->id_mesa}' title='Novo Pedido'><i class=\"material-icons\">&#xE89C;</i></a>";
                }
                else{
                    echo "<a href='info_mesa.php?id={$dado->id_mesa}' title='Manipular Mesa'><i class='material-icons'>&#xE150;</i></a>";
                    echo "<a href='mesa.php?oper=F&id={$dado->id_mesa}' title='Fechar Pedido' onClick=\"return confirm('Deseja fechar esse pedido?')\"><i class='material-icons'>&#xE850;</i></a>";
                }
                echo "</div>";
                echo "</div>";
            }
        ?>
    </form>
    <?php
        if($_SESSION["perfil"]=="1") {
            echo "<form method='post' action='#' class=\"fixed-action-btn\">
                <input type='hidden' name='sts' value='F'>
                <button type='submit' class=\"btn-floating btn-large brown\">
                <i class=\"material-icons\">add</i>
                </button>
            </form>";
        }
    ?>
</main>

<footer>

</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
</body>
</html>
