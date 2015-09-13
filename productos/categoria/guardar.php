<?php
$folder="../../";
include_once("../../basededatos.php");
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$valores=array("nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'"
                );
insertarRegistro("categoria",$valores);
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-green">MENSAJE</div>
        <div class="alert alert-success">
        Datos Guardados <strong>Correctamente</strong>
        </div>
        <a href="index.php" class="btn btn-blue">Nueva Categoria</a>
        <a href="listar.php" class="btn btn-success">Ver Categorias</a>
    </div>
   
</div>
<?php include_once($folder."pie.php");?>