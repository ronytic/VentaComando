<?php

$folder="../../";
$titulo="Reporte Ventas";
include_once("../../basededatos.php");
$sql="SELECT * FROM categoria WHERE activo=1 ORDER BY nombre";
$reg=consulta($sql);
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-0 col-lg-12 col-sm-12 col-xs-12 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-blue">Búsqueda de Ventas</div>
        <form action="buscar.php" method="post" class="formulario" rel="respuestaformulario">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th width="300">Nombre:</th>
                    <th width="200">C.I.:</th>
                    <th width="50">Fecha de Venta Inicio:</th>
                    <th width="50">Fecha de Venta Fin:</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="nombre" class="form-control"></td>
                <td><input type="text" name="ci" class="form-control"></td>
                <td><input type="date" name="fechaventainicio" class="form-control der" placeholder="" value="<?php echo date("Y-m-d");?>"></td>
                <td><input type="date" name="fechaventafin" class="form-control der" placeholder="" value="<?php echo date("Y-m-d");?>"></td>
                <td><select name="detalle"><option value="0">No</option><option value="1">Si</option></select></td>
                <td><input type="submit" name="" class=" btn btn-blue" value="Buscar"></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>
<div class="row">
<div class=" col-lg-12 col-sm-12 col-xs-12 trans" >
    <div class="well with-header with-footer" id="respuestaformulario">
    
     </div>
</div>
<?php include_once($folder."pie.php");?>