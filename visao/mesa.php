<?php
    require_once "auto.php";
    require_once "cabec.php";
    $idM = "";
    $oper = "";
    if($_GET){
        $oper = $_GET["oper"];
        $idM = $_GET["id"];
        if($oper == "I"){
            $mesa = new mesas($idM);
            $usuario = new usuario($id_usu);
            $pedido = new pedidos(null,$usuario,null,null,$mesa);
            $pedidoDAO = new pedidosDAO();
            $pedidoDAO->inserir($pedido);
            header("Location:info_mesa.php?id={$idM}");
        }
        if($oper == "F"){
            $mesa = new mesas($idM);
            $pedido = new pedidos(null,null,null,null,$mesa);
            $pedidoDAO = new pedidosDAO();
            $pedidoDAO->fecharPedido($pedido);
            header("Location:index.php");
        }
    }