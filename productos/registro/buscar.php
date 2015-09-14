<?php
include_once("../../basededatos.php");
$nombre=$_POST['nombre'];
$codcategoria=$_POST['codcategoria'];
$sql="SELECT * FROM producto WHERE nombre LIKE '$nombre%' and codcategoria LIKE '$codcategoria' and activo=1 ORDER BY nombre";
$reg=consulta($sql);
?>
<div class="header bordered-red">Datos de la Categoria</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>N</th><th>Nombre</th><th>Categoria</th><th>Código</th><th>Talla</th><th>Precio Mínimo</th><th></th>
        </tr>
    </thead>
<?php foreach($reg as $r){$i++;
$sql="SELECT * FROM categoria WHERE codcategoria=".$r['codcategoria']." and activo=1 ORDER BY nombre";
$cat=consulta($sql);
$c=array_shift($cat);
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $r['nombre']?></td>
    <td><?php echo $c['nombre']?></td>
    <td><?php echo $r['codigo']?></td>
    <td><?php echo $r['talla']?></td>
    <td><?php echo $r['preciominimo']?></td>
    <td>
        <a href="modificar.php?cod=<?php echo $r['codproducto']?>" class="btn btn-xs btn-success modificar">Modificar</a>
        <a href="eliminar.php" rel="<?php echo $r['codproducto']?>" class="btn btn-xs btn-danger eliminar">Eliminar</a>
    </td>
</tr>
<?php    
}?>
</table>
    