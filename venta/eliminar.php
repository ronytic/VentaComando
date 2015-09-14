<?php
include_once("../basededatos.php");
$coddetalleventatemporal=$_POST['coddetalleventatemporal'];
$sql="DELETE FROM detalleventatemporal WHERE coddetalleventatemporal=".$coddetalleventatemporal;
consulta($sql);
?>