<?php

$folder="../../";
include_once("../../basededatos.php");
$sql="SELECT * FROM categoria WHERE activo=1 ORDER BY nombre";
$reg=consulta($sql);
$titulo="Recarga de Inventario";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $("select[name=codcategoria]").change(function(e) {
        var codcategoria=$(this).val();
        $.post("productos.php",{"codcategoria":codcategoria},function(data){
            $("select[name=codproducto]").html(data);   
            $("select[name=codproducto]").change();
        });
        
    });
    $("select[name=codproducto]").change(buscar);
    $(".form").submit(function(e) {
        if(!confirm("¿Esta de Acuerdo en Recargar este producto?")){
            e.preventDefault()
        }
    });
});
function buscar(e){

        var codproducto=$("select[name=codproducto]").val();
        $.post("producto.php",{"codproducto":codproducto},function(data){
            $("input[name=codigo]").val(data.codigo);  
            $("input[name=talla]").val(data.talla); 
            $("input[name=stock]").val(data.stock); 
              
        },"json");
   

}
</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer" id="respuestaformulario">
    <div class="header bordered-blue">Datos del Producto a Recargar</div>
        <form action="guardar.php" method="post" enctype="multipart/form-data" class="form">
        <table class="table table-hover">
            <tr>
                <td class="der">Categoria:</td>
                <td><select name="codcategoria" class="form-control" required>
                    <option value="">Seleccionar</option>
                    <?php foreach($reg as $r){?>
                    <option value="<?php echo $r['codcategoria']?>"><?php echo $r['nombre']?></option>
                    <?php }?>
                </select></td>
            </tr>
            <tr>
                <td class="der">Producto:</td>
                <td>
                <select name="codproducto" class="form-control" required>
                
                </select>
                </td>
            </tr>
             <tr class="danger">
                <td class="der">Código:</td>
                <td><input type="text" name="codigo" class="form-control" readonly></td>
            </tr>
            <tr  class="danger">
                <td class="der">Talla:</td>
                <td><input type="text" name="talla" class="form-control" readonly></td>
            </tr>
             <tr  class="danger">
                <td class="der">Cantidad de Stock:</td>
                <td><input type="number" name="stock" class="form-control " min="0" value="0" readonly></td>
            </tr>
             <tr>
                <td class="der">Cantidad Nueva de Compra:</td>
                <td><input type="number" name="cantidadnueva" class="form-control " min="0" value="0" required></td>
            </tr>
             <tr>
                <td class="der">Fecha de Compra:</td>
                <td><input type="date" name="fechacompra" class="form-control" value="<?php echo date("Y-m-d")?>"></td>
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