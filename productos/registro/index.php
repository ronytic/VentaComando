<?php

$folder="../../";
include_once("../../basededatos.php");
$sql="SELECT * FROM categoria WHERE activo=1 ORDER BY nombre";
$reg=consulta($sql);
$titulo="Registro de Nuevo Producto";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer" id="respuestaformulario">
    <div class="header bordered-blue">Datos del Nuevo Producto</div>
        <form action="guardar.php" method="post" enctype="multipart/form-data">
        <table class="table table-hover">
            <tr>
                <td class="der">Categoria:</td>
                <td><select name="codcategoria" class="form-control">
                    <?php foreach($reg as $r){?>
                    <option value="<?php echo $r['codcategoria']?>"><?php echo $r['nombre']?></option>
                    <?php }?>
                </select></td>
            </tr>
            <tr>
                <td class="der">Nombre:</td>
                <td><input type="text" name="nombre" class="form-control"></td>
            </tr>
             <tr>
                <td class="der">Código:</td>
                <td><input type="text" name="codigo" class="form-control"></td>
            </tr>
            <tr>
                <td class="der">Talla:</td>
                <td><input type="text" name="talla" class="form-control"></td>
            </tr>
            <tr>
                <td class="der">Descripción:</td>
                <td><textarea name="descripcion" class="form-control" rows="7"></textarea></td>
            </tr>
             <tr>
                <td class="der">Precio Mínimo de Venta:</td>
                <td><input type="number" name="preciominimo" class="form-control der" min="0" value="0"></td>
            </tr>
             <tr>
                <td class="der">Precio Máximo de Venta:<br><span class="badge badge-info">0 = Desconoce</span></td>
                <td><input type="number" name="preciomaximo" class="form-control der" min="0" value="0"></td>
            </tr>
             <tr>
                <td class="der">Fotografía:</td>
                <td><input type="file" name="foto" class="form-control"></td>
            </tr>
            <tr>
                <td class="der"></td>
                <td><input type="submit" name="" class=" btn btn-blue" value="Guardar"></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<?php include_once($folder."pie.php");?>