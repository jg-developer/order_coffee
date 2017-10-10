<?php
require_once "auto.php";
require_once "cabec.php";
if($_POST){
    $cozinha = new cozinha($_POST["idP"]);
    $cozinhaDAO = new cozinhaDAO();
    $cozinhaDAO->servirPedido($cozinha);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Order Coffee</title>
    <!--Import Google Icon Font-->
    <meta http-equiv="refresh" content="10">
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
            <div class="nav-wrapper center"><a class="brand-logo center">Pedidos</a></div>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav fixed z-depth-3">
        <li><div class="userView">
                <div class="background">
                    <img src="../img/bg.png">
                </div>
                <span class="white-text name">Order Coffee</span>
                <span class='white-text email'>Olá, quando os pedidos estiverem prontos clique em servido!</span>
                <br>
            </div></li>
        <br><br><br><br><br>
        <?php require_once "menu.php";?>
    </ul>
</header>
<main>
    <form class="row" method="post" action="#">
        <?php
        $cozinhaDAO = new cozinhaDAO();
        $listarPedidos = $cozinhaDAO->listarPedidos();
        foreach ($listarPedidos as $dado) {
            if($dado->status == "N") {
                echo "<div class='card col s12 m2 l2 offset-l1 offset-m1'>";
                echo "<div class='card-content'>";
                echo "<span class='card-title grey-text text-darken-4'>{$dado->produto}</span>";
                echo "<input type='hidden' name='idP' value='{$dado->id_c}'>";
                echo "<input type='hidden' name='sts' value='S'>";
                echo "<p>Quantidade:" . $dado->quant . "</p>";
                echo "</div>";
                echo "<div class='card-action'>";
                echo "<input type='submit' value='Servido'>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </form>
</main>

<footer>

</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
</body>
</html>
