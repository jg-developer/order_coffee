<?php
    require_once "auto.php";
    require_once "cabec.php";
        $nome = "";
        $idNota = "";
        $idM = "";
    if($_GET){
        $idNota = $_GET["id"];
        $nome = $_GET["nome"];
        $idM = $_GET["idM"];
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
            <?php echo "<div class='nav-wrapper center'><a class='brand-logo center'>$nome - Selecione uma Categoria</a></div>";?>
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
            $categoriaDAO = new categoriaDAO();
            $ret = $categoriaDAO->buscarTodas();
            foreach ($ret as $dado) {
                echo "<div class='card col s12 m4 l4 offset-l1 offset-m1'>";
                echo "<a href='v_prod.php?idN={$idNota}&id={$dado->id_categoria}&nome={$nome}&idM={$idM}' title='Ver produtos da categoria'><div class='card-content'>";
                echo "<span class='card-title grey-text text-darken-4'>{$dado->descricao}</span>";
                echo "</div></a>";
                echo "</div>";
            }
        ?>
    </form>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large brown">
            <i class="material-icons">add</i>
        </a>
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

