<?php
$folder="../";
include_once("../basededatos.php");
if(!empty($_POST)){
    extract($_POST);
    $valores=array("total"=>"'$total'",
                    "nombre"=>"'$nombre'",
                    "ci"=>"'$ci'",
                    );

    insertarRegistro("venta",$valores);
    $codventa=ultimo();
    $sql="SELECT * FROM detalleventatemporal ";
    $reg=consulta($sql);

    foreach($reg as $r){$i++;
        /*Desde Aqui*/

        if($r['codproducto']==""){
            continue;   
        }
        $codproductos=$r['codproducto'];
        $cantidad=$r['cantidad'];
        $cantidadventatotal=$prod['cantidad'];
        $preciounitario=$prod['precioventa'];
        $subtotal=$prod['total'];
        
        $fecha=date("Y-m-d");
        $totalproducto=0;

        $sql="SELECT sum(cantidadstock) as cantidastock FROM compra WHERE codproducto LIKE '".$r['codproducto']."' and activo=1";
        $cantidastock=consulta($sql);
        $cantidastock=array_shift($cantidastock);
        $stock=$cantidastock['cantidastock'];
        if($stock==""){$stock=0;}
        $totalproducto=$stock;

        //echo $totalproducto."<br>";
        //exit();
        //echo $totalproducto;
        $sql="SELECT * FROM producto WHERE codproducto=".$r['codproducto'];
        $re=consulta($sql);
        $pr=array_shift($re);
        $nombreproducto=$pr['nombre'];
        
        if($totalproducto<$cantidad){
            $mensaje[]="No Existe en Inventario la Cantidad que Solicita<hr><strong><br>Nombre Producto: $nombreproducto<br>Cantidad de Inventario: $totalproducto<br>Cantidad de Solicitada: $cantidad</strong>";
        }else{
            $sql="SELECT * FROM compra WHERE codproducto=$codproductos and cantidadstock>0 ORDER BY fechacompra";
        
            $com=consulta($sql);
            foreach($com as $inv){
                if((float)$cantidad<=(float)$inv['cantidadstock']){
                    //echo "si";
                    $mensaje[]="La Venta del producto ".mb_strtoupper($nombreproducto,"utf8")." se registro correctamente";
                    
                    $cantidad=$inv['cantidadstock']-$cantidad;
                    $valores=array("cantidadstock"=>"$cantidad");
                    actualizarRegistro("compra",$valores,$inv["codcompra"]);
                    
                    //print_r($valores);

                    $valores=array("codventa"=>"'$codventa'",
                        "codproducto"=>"'".$r['codproducto']."'",
                        "cantidad"=>"'".$r['cantidad']."'",
                        "precioventa"=>"'".$r['precioventa']."'",
                        "total"=>"'".$r['total']."'",
                        );

                    insertarRegistro("ventadetalle",$valores);
        
                    break;  
                }else{
                    //echo $cantidadsalida;
                    $cantidad=$cantidad-$inv['cantidadstock'];
                    $valores=array("cantidadstock"=>0);
                    actualizarRegistro("compra",$valores,$inv["codcompra"]);
                }
            }
        }





        /*HAsta Aqui*/
        
        $sql="DELETE FROM detalleventatemporal WHERE coddetalleventatemporal=".$r['coddetalleventatemporal'];
        consulta($sql);
    }
}
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-green">MENSAJE</div>
        <div class="alert alert-success">
        <strong>Venta Realizada Correctamente</strong>
        </div>
        <a href="../index.php" class="btn btn-blue">Nueva Venta</a>
        <!--<a href="boleta.php?codventa=<?php echo $codventa?>" class="btn btn-success">Boleta</a>-->
    </div>
   
</div>
<?php include_once($folder."pie.php");?>