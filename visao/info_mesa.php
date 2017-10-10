<?php
    require_once "auto.php";
    require_once "cabec.php";
    $idM = "";
    $nome = "";
    $idNota = "";
    if($_GET){
        $idM = $_GET["id"];
        $mesas = new mesas($idM);
        $mesasDAO = new mesasDAO();
        $ret = $mesasDAO->buscarUma($mesas);
        foreach ($ret as $dado){
           $nome = $dado->descricao;
           $idNota = $dado->id_nfv;
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

<body>
<header>
    <nav class="top-nav brown">
        <div class="container">
            <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
            <?php echo "<div class='nav-wrapper center'><a class='brand-logo center'>$nome</a></div>";?>
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
        <table class="striped centered responsive-table" id="tabela">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Valor Total</th>
            </tr>
            </thead>

            <tbody>
            <?php
                require_once "auto.php";
                $pedidos = new pedidos($idNota);
                $pedidosDAO = new pedidosDAO();
                $retorno = $pedidosDAO->listar($pedidos);
                $tot = 0;
                foreach ($retorno as $dado) {
                    echo "<tr>";
                    echo "<td>{$dado->prod}</td>";
                    echo "<td>{$dado->quant}</td>";
                    echo "<td>{$dado->preco}</td>";
                    echo "<td>{$dado->valorT}</td>";
                    echo "</tr>";
                    $tot=$tot+$dado->valorT;
                }
                echo "</tbody>";
                echo "</table>";
                echo "<h4>Total: R$".number_format($tot, 2, ',','.')."</h4>";
            ?>

    </div>
    <div class="fixed-action-btn horizontal click-to-toggle">
        <a class="btn-floating btn-large brown">
            <i class="material-icons">menu</i>
        </a>
        <ul>
            <?php echo "<li><a href='v_cat.php?id={$idNota}&nome={$nome},&idM={$idM}' title='Adicionar Produtos' class=\"btn-floating brown lighten-1\"><i class=\"material-icons\">&#xE147;</i></a></li>";?>
            <?php echo "<li><a href='mesa.php?oper=F&id={$idM}' title='Fechar Pedido' class=\"btn-floating brown lighten-1\" onClick=\"return confirm('Deseja fechar esse pedido?')\"><i class='material-icons'>&#xE850;</i></a></li>";?>
        </ul>
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

