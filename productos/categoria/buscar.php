<?php
include_once("../../basededatos.php");
$nombre=$_POST['nombre'];
$sql="SELECT * FROM categoria WHERE nombre LIKE '$nombre%' and activo=1 ORDER BY nombre";
$reg=consulta($sql);
?>
<div class="header bordered-red">Datos de la Categoria</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>N</th><th>Nombre</th><th>Descripción</th><th></th>
        </tr>
    </thead>
<?php foreach($reg as $r){$i++;
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $r['nombre']?></td>
    <td><?php echo $r['descripcion']?></td>
    <td>
        <a href="modificar.php?cod=<?php echo $r['codcategoria']?>" class="btn btn-xs btn-success modificar">Modificar</a>
        <a href="eliminar.php" rel="<?php echo $r['codcategoria']?>" class="btn btn-xs btn-danger eliminar">Eliminar</a>
    </td>
</tr>
<?php    
}?>
</table>
    