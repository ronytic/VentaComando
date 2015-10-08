<?php
include_once("../../basededatos.php");
$fechagasto=$_POST['fechagasto'];
$sql="SELECT * FROM gasto WHERE fechagasto LIKE '$fechagasto' and activo=1 ORDER BY horaregistro";
//echo $sql;
$reg=consulta($sql);
?>
<div class="header bordered-red">Datos de la Categoria</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="50">N</th><th>Detalle</th><th width="100">Total</th><th width="100">Fecha del Gasto</th><th></th>
        </tr>
    </thead>
<?php 
$t=0;
foreach($reg as $r){$i++;
$t+=$r['subtotal']; 
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $r['detalle']?></td>
    <td class="der"><?php echo number_format($r['subtotal'],2)?></td>
    <td><?php echo date("d-m-Y",strtotime($r['fechagasto']))?></td>
    <td>
    <!--
        <a href="modificar.php?cod=<?php echo $r['codproducto']?>" class="btn btn-xs btn-success modificar">Modificar</a>
        <a href="eliminar.php" rel="<?php echo $r['codproducto']?>" class="btn btn-xs btn-danger eliminar">Eliminar</a>
    -->    
    </td>
</tr>
<?php    
}?>
<tr class="success"><td colspan="2" class="der resaltar">Total:</td><td class="der"><?php echo number_format($t,2)?></td><td></tr>
</table>