<?php
include_once("../basededatos.php");
$codigo=$_POST['codigo'];
$codigo=$codigo!=""?$codigo:'%';
$codproducto=$_POST['codproducto'];
$sql="SELECT * FROM producto WHERE codigo LIKE '$codigo' and codproducto LIKE '$codproducto'";
//echo $sql;
$reg=consulta($sql);
$reg=array_shift($reg);

/*$sql="SELECT min(preciominimo) as preciominimo FROM compra WHERE codproducto LIKE '".$reg['codproducto']."'";
$preciomin=consulta($sql);
$preciomin=array_shift($preciomin);*/
$preciominimo=$reg['preciominimo'];

/*$sql="SELECT max(preciomaximo) as preciomaximo FROM compra WHERE codproducto LIKE '".$reg['codproducto']."'";
$preciomax=consulta($sql);
$preciomax=array_shift($preciomax);
*/
$preciomaximo=$reg['preciomaximo'];

$sql="SELECT sum(cantidadstock) as cantidastock FROM compra WHERE codproducto LIKE '".$reg['codproducto']."'";
$cantidastock=consulta($sql);
$cantidastock=array_shift($cantidastock);

$stock=$cantidastock['cantidastock'];
if($stock==""){$stock=0;}
?>
<div class="header bordered-gold">Datos del Producto</div>
<table class="table">
<tr>
    <td width="40%" rowspan="8" style="vertical-align:top">
    <img src="imagenes/productos/<?php echo $reg['foto']?>" class="img-thumbnail img-rounded" width="90%">

            <span class="">Descripción:</span>

<pre><?php echo $reg['descripcion']?></pre>


    </td>
    <td>
    <div class="alert alert-warning fade in"><?php echo $reg['nombre']?></div>
    
        <table class="table table-hover table-bordered">
        <tr>
            <td class="der">
            <span class="label label-danger">Codigo:</span>
            </td>
            <td>
            <span class="label label-primary"><?php echo $reg['codigo']?></span>
            </td>
        </tr>
        <tr>
            <td class="der">
            <span class="label label-danger">Talla:</span>
            </td>
            <td><span class="label label-primary"><?php echo $reg['talla']?></span>
            </td>
            
        </tr>
        
        <tr>
            <td class="der">
            <span class="">Precio Mínimo de Venta:</span>
            </td>
            <td>
            <span class="label label-green"><?php echo $preciominimo?></span>
            </td>
        </tr>
        <tr>
            <td class="der">
            <span class="">Precio Máximo de Venta:</span>
            </td>
            <td>
            <span class="label label-green"><?php echo $preciomaximo?></span>
            </td>
        </tr>
        <tr class="danger">
            <td class="der">
            <span class="">Stock del Inventario:</span>
            </td>
            <td>
            <span class="label label-danger"><h4><?php echo $stock?></h4></span>
            </td>
        </tr>
        <tr>
            <td class="der">
            <span class="resatar">Cantidad a Vender:</span>
            </td>
            <td>
            <input type="number" class="input-lg der" value="1" step="1" min="0" max="<?php echo $stock?>" id="cantidadvender">
            </td>
        </tr>
        <tr>
            <td class="der">
            <span class="">Precio de Venta:</span>
            </td>
            <td>
            <input type="number" class="input-lg der" value="<?php echo $preciominimo?>" step="1" min="<?php echo $preciominimo?>" id="precioventa">
            </td>
        </tr>
        <tr class="success">
            <td class="der">
            <span class="label label-success">Total:</span>
            </td>
            <td>
            <input type="number" class="input-lg der" value="0"  readonly id="total">
            <input type="hidden" value="<?php echo $reg['codproducto']?>"  id="codproducto">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Agregar" class="btn btn-success" id="agregar"></td>
        </tr>
        </table>
    
    </td>
</tr>
</table>
<script language="javascript" type="text/javascript">
calcular()
</script>