<?php
$l=$_POST['l'];
?>
<tr>
	<td class="der"><?php echo $l?></td>
	<td><input type="text" name="g[<?php echo $l?>][detalle]" class="form-control"></td>
	<td><input type="number" name="g[<?php echo $l?>][subtotal]" class="form-control der subtotal" value="0" min="0" step="1"></td>
</tr>