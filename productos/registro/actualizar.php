<?php
$folder="../../";
include_once("../../basededatos.php");
extract($_POST);
if($_FILES['foto']['name']!=""){
    @copy($_FILES['foto']['tmp_name'],"../../imagenes/productos/".$_FILES['foto']['name']);  
    $foto=$_FILES['foto']['name'];  
}
$valores=array("codcategoria"=>"'$codcategoria'",
                "nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
                "codigo"=>"'$codigo'",
                "talla"=>"'$talla'",
                "descripcion"=>"'$descripcion'",
                "preciominimo"=>"'$preciominimo'",
                "preciomaximo"=>"'$preciomaximo'",
                
                );
if($_FILES['foto']['name']!=""){
    $valores["foto"]="'$foto'";
}               

actualizarRegistro("producto",$valores,$cod);
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-green">MENSAJE</div>
        <div class="alert alert-success">
        Datos Guardados <strong>Correctamente</strong>
        </div>
        <a href="index.php" class="btn btn-blue">Nuevo Producto</a>
        <a href="listar.php" class="btn btn-success">Ver Productos</a>
    </div>
   
</div>
<?php include_once($folder."pie.php");?>