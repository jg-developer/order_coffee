<?php
    require_once "auto.php";
    require_once "cabec.php";
    $nome = "";
    $idNota = "";
    $idM = "";
    if($_GET){
        $idNota = $_GET["idN"];
        $categoria = $_GET["id"];
        $nome = $_GET["nome"];
        $idM = $_GET["idM"];
    }
    if($_POST){
        $prod = new produtos($_POST["idP"]);
        $pedido = new pedidos($_POST["idN"]);
        $itens_pedido = new itens_pedido(null, $_POST["quant"], null, $prod, $pedido);
        $itens_pedidoDAO = new itens_pedidoDAO();
        $itens_pedidoDAO->inserir_itens($itens_pedido);
        header("Location:info_mesa.php?id={$idM}");
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
            <?php echo "<div class='nav-wrapper center'><a class='brand-logo center'>$nome  Selecione um Produto</a></div>";?>
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
    <div class="row">
        <?php
        $cat = new categoria($categoria);
        $prod = new produtos(null, null, null, null, $cat);
        $prodDAO = new produtosDAO();
        $ret = $prodDAO->prod_cat($prod);
        if (is_array($ret) || is_object($ret)) {
            foreach ($ret as $dado) {
                echo "<div class='card col s12 m4 l3 offset-l1 offset-m1'>";
                echo "<a href='#inserir' onclick='vP({$dado->id_prod}, {$dado->valor})' title='Selecionar produto'><div class='card-content'>";
                echo "<span class='card-title grey-text text-darken-4'>{$dado->descritivo}</span>";
                echo "<p>Preço:{$dado->valor}</p>";
                echo "</div></a>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <div class="row">
        <div id="inserir" class="modal" class="col l3">
            <form method="POST" action="#">
                <div class="modal-content">
                    <h4>Insira a Quantidade</h4>
                    <div class="row">
                        <div class="input-field col s12 l10">
                            <?php echo"<input id='idN' value=\"{$idNota}\" name='idN' type='hidden'>";?>
                            <?php echo"<input id='idM' value=\"{$idM}\" name='idM' type='hidden'>";?>
                            <input id="preco" name="preco" type="hidden">
                            <input id="idP" name="idP" type="hidden">
                            <input id="quant" name="quant" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Ok" class="modal-action modal-close waves-effect waves-green btn-flat"/>
                    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                </div>
            </form>
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

