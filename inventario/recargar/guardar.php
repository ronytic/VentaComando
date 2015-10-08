<?php
$folder="../../";
include_once("../../basededatos.php");
if(!empty($_POST)){
$cantidadnueva=$_POST['cantidadnueva'];
$codproducto=$_POST['codproducto'];
$valores=array("cantidad"=>"'$cantidadnueva'",
                "cantidadstock"=>"'$cantidadnueva'",
                "fechacompra"=>"'$fechacompra'",
                "codproducto"=>"'$codproducto'",
                );
insertarRegistro("compra",$valores);
}
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-green">MENSAJE</div>
        <div class="alert alert-success">
        Datos Guardados <strong>Correctamente</strong>
        </div>
        <a href="index.php" class="btn btn-blue">Nueva Recarga</a>
    </div>
   
</div>
<?php include_once($folder."pie.php");?>