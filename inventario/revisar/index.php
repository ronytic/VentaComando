<?php

$folder="../../";
$titulo="Revisar Inventario";
include_once("../../basededatos.php");
$sql="SELECT * FROM categoria WHERE activo=1 ORDER BY nombre";
$reg=consulta($sql);
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-blue">Búsqueda de Productos</div>
        <form action="buscar.php" method="post" class="formulario" rel="respuestaformulario">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                
                    <th>Nombre del Producto:</th>
                    <th>Categoria del Producto:</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="nombre" class="form-control" placeholder="Ej: Guantes"></td>
                <td>
                    <select name="codcategoria" class="form-control">
                    <option value="%">Todos</option>
                    <?php foreach($reg as $r){?>
                    <option value="<?php echo $r['codcategoria']?>"><?php echo $r['nombre']?></option>
                    <?php }?>
                </select>
                </td>
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