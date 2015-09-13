<?php
$folder="./";
$titulo="Venta de Productos";
include_once("basededatos.php");
$sql="SELECT * FROM producto ORDER BY codigo,nombre";
$reg=consulta($sql);

include_once("cabecerahtml.php");
?>
<style type="text/css">
.der{
text-align:right !important;    

}
</style>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
	deatalleventa();
})
$(document).on("change","#cantidadvender,#precioventa",calcular);

$(document).on("click","#agregar",agregar);
$(document).on("click",".eliminar",function(e){
	e.preventDefault();
	if(confirm("¿Desea Eliminar esta Venta?")){
		var codigo=$(this).attr("rel");
		$.post("venta/eliminar.php",{"codproducto":codigo},function(){
			deatalleventa();
		});
	}
});
function calcular(){
    var cantidadvender=$("#cantidadvender").val();  
    var precioventa=$("#precioventa").val();  
    var total=cantidadvender*precioventa;
    total=total.toFixed(2);
    $("#total").val(total);
}

function agregar(){
	var codproducto=$("#codproducto").val();
	var cantidadvender=$("#cantidadvender").val();
	var precioventa=$("#precioventa").val();
	var total=$("#total").val();
    $.post("venta/detalleventa.php",{"codproducto":codproducto,"cantidadvender":cantidadvender,"precioventa":precioventa,"total":total},function(data){
    	$("#detalleventa").html(data)
    });
}
function deatalleventa(){
	$.post("venta/detalleventa.php",{},function(data){
    	$("#detalleventa").html(data)
    });
}
</script>
<?php include_once("cabecera.php");?>
<div class="col-lg-4 col-sm-12 col-xs-12 trans">
    <div class="well with-header with-footer">
        <div class="header bordered-blue">Búqueda Producto</div>
        <form class="formulario" method="post" action="venta/busquedaproducto.php" rel="respuestaformulario">
        <label>
            Código de Producto:
            <input type="text" class="form-control input-xs" name="codigo" autofocus>
        </label>
        <label>
            Producto:<br>
           <select name="codproducto">
            <option value="%">Todos</option>
            <?php
            foreach($reg as $r){
                ?>
                <option value="<?php echo $r['codproducto']?>"><?php echo $r['codigo']?> - <?php echo $r['nombre']?></option>
                <?php
            }
            ?>
           </select>
        </label>
        <br>
        <input type="submit" value="Buscar" class="btn btn-blue">
        </form>
    </div>
</div>
<div class="col-lg-8 col-sm-12 col-xs-12 trans" >
    <div class="well with-header with-footer" id="respuestaformulario">
    
    </div>
</div>

</div><!--ROW-->
<div class="row">

<div class="col-lg-12 col-sm-12 col-xs-12 trans">
    <div class="well with-header with-footer">
        <div class="header bordered-red">Detalle de Venta</div>
        <div id="detalleventa"></div>
</div>
<?php include_once("pie.php");?>