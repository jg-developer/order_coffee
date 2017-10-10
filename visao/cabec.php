<?php
require_once "auto.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION["usuario"]))
    {
        $usuario = $_SESSION["usuario"];
        $id_usu = $_SESSION["id"];
    }
?>


