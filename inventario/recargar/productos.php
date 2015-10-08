<?php
$codcategoria=$_POST['codcategoria'];
include_once("../../basededatos.php");
$sql="SELECT * FROM producto WHERE codcategoria LIKE '$codcategoria' and activo=1 ORDER BY nombre";
//echo $sql;
$reg=consulta($sql);
foreach($reg as $r){
?>
<option value="<?php echo $r['codproducto']?>"><?php echo $r['nombre']?> - <?php echo $r['codproducto']?></option>
<?php  
}
?>