<?php
$codproducto=$_POST['codproducto'];
include_once("../../basededatos.php");
$sql="SELECT * FROM producto WHERE codproducto LIKE '$codproducto' and activo=1 ORDER BY nombre";
$reg=consulta($sql);
$reg=array_shift($reg);


$sql="SELECT sum(cantidadstock) as cantidastock FROM compra WHERE codproducto LIKE '".$codproducto."'";
$cantidastock=consulta($sql);
$cantidastock=array_shift($cantidastock);
$stock=$cantidastock['cantidastock'];
if($stock==""){$stock=0;}


$val=array("codigo"=>$reg['codigo'],
            "talla"=>$reg['talla'],
            "stock"=>$stock,
            );
echo json_encode($val)
?>