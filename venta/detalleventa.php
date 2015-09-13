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
	<?php foreach($reg as $r){$i++;
		$sql="SELECT * fROM producto WHERE codproducto=".$r['codproducto'];
		$p=consulta($sql);
		$p=array_shift($p);
		?>
		<tr>
			<td><?php echo $i?></td>
			<td><?php echo $p['codigo']?></td>
			<td><?php echo $p['nombre']?></td>
			<td class="der"><?php echo $r['cantidad']?></td>
			<td class="der"><?php echo $r['precioventa']?></td>
			<td class="der"><?php echo $r['total']?></td>
			<td><a href="#" class="btn btn-xs btn-danger eliminar" title="Eliminar" rel="<?php echo $r['coddetalleventatemporal']?>">X</a></td>
		</tr>
		<?php
	}?>
</table>
<table class="table">
	<tr><td>Nombre:<input type="text" class="form-control input-xs"></td>
			<td>Carnet/Nit:<input type="text" class="form-control input-xs"></td>
			<td><br><input type="submit" value="Guardar Venta" class="btn btn-success"></td>
	</tr>
</table>