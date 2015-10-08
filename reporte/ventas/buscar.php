<?php
$datos=array();
foreach($_POST as $k=>$v){
    array_push($datos,"$k=$v");
}
$url="reporte.php?".implode($datos,"&");
//echo $url;
?>
<a href="<?php echo $url?>" class="btn btn-danger btn-xs" target="_blank">Abrir en otra Ventana</a>
<br>
<iframe class="" src="<?php echo $url?>" height="700" width="100%"></iframe>