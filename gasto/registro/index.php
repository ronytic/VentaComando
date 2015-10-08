<?php

$folder="../../";
$titulo="Gastos";
include_once("../../basededatos.php");
$sql="SELECT * FROM categoria WHERE activo=1 ORDER BY nombre";
$reg=consulta($sql);
include_once($folder."cabecerahtml.php");
?>
<script type="text/javascript">
var l=0;
    $(document).on("ready",function(){
        aumentar(event);
        $(".aumentar").on("click",aumentar)
        $(document).on("change",".subtotal",function(){
            var t=0;
            $(".subtotal").each(function(){
                var tot=parseFloat($(this).val());
                t+=tot;
            });
            $(".total").val(t);
        })
        $(".form").submit(function(e) {
            if(!confirm("¿Esta de Seguro de registrar estos Gastos?")){
                e.preventDefault()
            }
        });
    });
    function aumentar(e){
        e.preventDefault();
            l++;
            $.post("aumentar.php",{"l":l},function(data){
                $(".marcador").before(data);
            });
    }
</script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-0 col-lg-12 col-sm-12 col-xs-12 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-blue">Registro de Gastos</div>
        <form action="guardar.php" method="post" class="form" rel="">
        <table class="table">
            <tr><td class="der">Fecha del Gasto</td>
                <td width="200"><input type="date" name="fechagasto" value="<?php echo date("Y-m-d");?>" class="der form-control" ></td>
            </tr>
        </table>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th width="100">Nº</th>
                    <th>Detalle del Gasto</th>
                    <th width="200">Monto</th>
                </tr>
            </thead>
            <tr class="marcador success">
                <td><a href="#" class="aumentar btn btn-xs btn-success">Incrementar</a></td>
                <td class="der resaltar"><input type="submit" name="" class=" btn btn-blue" value="Guardar"> Total:</td>
                <td>
                    <input type="number" name="total" class="form-control der resaltar total" placeholder="" readonly="" value="0" step="1" min="0">
                </td>
                
                
            </tr>
        </table>
        </form>
    </div>
</div>
</div>
<div class="row">
<div class=" col-lg-12 col-sm-12 col-xs-12 trans" >
    
</div>
<?php include_once($folder."pie.php");?>