<?php
include_once("../../basededatos.php");
$codigo=$_POST['codigo'];
eliminar("producto",$codigo);
?>