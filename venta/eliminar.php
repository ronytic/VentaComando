<?php
include_once("../basededatos.php");
$codproducto=$_POST['codproducto'];
$sql="DELETE FROM detalleventatemporal WHERE codproducto=".$codproducto;
consulta($sql);
?>