<?php
include_once("../basededatos.php");
$codproducto=$_POST['codproducto'];
$cantidadvender=$_POST['cantidadvender'];
$precioventa=$_POST['precioventa'];
$total=$_POST['total'];
if($codproducto!=""){
	$sql="INSERT INTO detalleventatemporal VALUES(NULL,$codproducto,$cantidadvender,$precioventa,$total)";
	consulta($sql);	
	}
$sql="SELECT * FROM detalleventatemporal ";
$reg=consulta($sql);

?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Nº</th>
			<th>Codigo</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio Venta</th>
			<th>Total</th>
			<th></th>
		</tr>
	</thead>
	<?php 
    $total=0;
        foreach($reg as $r){$i++;
		$sql="SELECT * fROM producto WHERE codproducto=".$r['codproducto'];
		$p=consulta($sql);
		$p=array_shift($p);
        $total+=$r['total'];
		?>
		<tr>
			<td class="der"><?php echo $i?></td>
			<td><?php echo $p['codigo']?></td>
			<td><?php echo $p['nombre']?></td>
			<td class="der"><?php echo $r['cantidad']?></td>
			<td class="der"><?php echo number_format($r['precioventa'],2)?></td>
			<td class="der"><?php echo number_format($r['total'],2)?></td>
			<td><a href="#" class="btn btn-xs btn-danger eliminartemp" title="Eliminar" rel="<?php echo $r['coddetalleventatemporal']?>">X</a></td>
		</tr>
		<?php
	}?>
    <tr class="success">
        <td class="der resaltar" colspan="5">TOTAL</td>
        <td class="resaltar der"><?php echo number_format($total,2)?></td>
        <td></td>
    </tr>
</table>
<form action="venta/guardar.php" method="post">
<input type="hidden" name="total" value="<?php echo $total?>">
<table class="table">
	<tr><td>Nombre:<input type="text" class="form-control input-xs" name="nombre" required></td>
			<td>Carnet/Nit:<input type="text" class="form-control input-xs" name="ci"></td>
			<td><br><input type="submit" value="Guardar Venta" class="btn btn-success"></td>
	</tr>
</table>
</form>