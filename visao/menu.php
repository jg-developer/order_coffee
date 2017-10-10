<?php
    if($_SESSION["perfil"] == 1){
        echo "<li><div class=\"divider\"></div></li>
        <li><a href=\"index.php\"><i class=\"material-icons\">restaurant</i>Mesas</a></li>
        <li><div class=\"divider\"></div></li>
        <li><a href=\"produtos.php\"><i class=\"material-icons\">local_cafe</i>Produtos</a></li>
        <li><div class=\"divider\"></div></li>
        <li><a href=\"categorias.php\"><i class=\"material-icons\">pages</i>Categorias</a></li>
        <li><div class=\"divider\"></div></li>
        <li><a href=\"usuarios.php\"><i class=\"material-icons\">person</i>Usuários</a></li>
        <li><div class=\"divider\"></div></li>
        <li><a href=\"sair.php\" href=\"#!\"><i class=\"material-icons\">exit_to_app</i>Sair</a></li>
        <li><div class=\"divider\"></div></li>";
    } elseif ($_SESSION["perfil"]==2){
        echo "<li><div class=\"divider\"></div></li>
        <li><a href=\"index.php\"><i class=\"material-icons\">restaurant</i>Mesas</a></li>
        <li><div class=\"divider\"></div></li>
        <li><a href=\"sair.php\" href=\"#!\"><i class=\"material-icons\">exit_to_app</i>Sair</a></li>
        <li><div class=\"divider\"></div></li>";
    } elseif ($_SESSION["perfil"]==3){
        echo "<li><div class=\"divider\"></div></li>
        <li><a href=\"sair.php\" href=\"#!\"><i class=\"material-icons\">exit_to_app</i>Sair</a></li>
        <li><div class=\"divider\"></div></li>";
    }