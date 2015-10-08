<?php
$folder="../../";
include_once("../../basededatos.php");
if(!empty($_POST)){
	extract($_POST);
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	exit();*/
	foreach($g as $r){
		$valores=array("detalle"=>"'".$r['detalle']."'",
	                "subtotal"=>"'".$r['subtotal']."'",
	                "fechagasto"=>"'$fechagasto'",
	                );

		insertarRegistro("gasto",$valores);
	}
}
//print_r($g);
//exit();
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-green">MENSAJE</div>
        <div class="alert alert-success">
        <strong>Gasto Registrado Correctamente</strong>
        </div>
        <a href="index.php" class="btn btn-blue">Nuevo Gasto</a>
        <a href="listar.php" class="btn btn-blue">Ver Gastos</a>
    </div>
   
</div>
<?php include_once($folder."pie.php");?>