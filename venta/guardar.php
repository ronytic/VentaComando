<?php
$folder="../";
include_once("../basededatos.php");
extract($_POST);
$valores=array("total"=>"'$total'",
                "nombre"=>"'$nombre'",
                "ci"=>"'$ci'",
                );

insertarRegistro("venta",$valores);
$codventa=ultimo();
$sql="SELECT * FROM detalleventatemporal ";
$reg=consulta($sql);
 foreach($reg as $r){$i++;
$valores=array("codventa"=>"'$codventa'",
                "codproducto"=>"'".$r['codproducto']."'",
                "cantidad"=>"'".$r['cantidad']."'",
                "precioventa"=>"'".$r['precioventa']."'",
                "total"=>"'".$r['total']."'",
                );

insertarRegistro("ventadetalle",$valores);
$sql="DELETE FROM detalleventatemporal WHERE coddetalleventatemporal=".$r['coddetalleventatemporal'];
consulta($sql);
 }
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-green">MENSAJE</div>
        <div class="alert alert-success">
        <strong>Venta Realizada Correctamente</strong>
        </div>
        <a href="../index.php" class="btn btn-blue">Nueva Venta</a>
        <a href="boleta.php?codventa=<?php echo $codventa?>" class="btn btn-success">Boleta</a>
    </div>
   
</div>
<?php include_once($folder."pie.php");?>