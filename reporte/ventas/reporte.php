<?php
include_once("../../basededatos.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Ventas";
$fechaventainicio=$_GET['fechaventainicio'];
$fechaventafin=$_GET['fechaventafin'];
$nombre=$_GET['nombre'];
$ci=$_GET['ci'];
$detalle=$_GET['detalle'];

class PDF extends PPDF{
	function Cabecera(){
		global $fechaventainicio,$fechaventafin,$detalle;
		$this->CuadroCabecera(30,"Fecha Desde:",20,$fechaventainicio);
		$this->CuadroCabecera(20,"Hasta:",20,$fechaventafin);
		$this->ln();
		$this->TituloCabecera(5,"N");
		$this->TituloCabecera(30,"Nombre");
		$this->TituloCabecera(20,"C.I.");
		$this->TituloCabecera(20,"FechaVenta");
		$this->TituloCabecera(20,"Total");

		if($detalle==1){
		$this->TituloCabecera(40,"Producto");
		$this->TituloCabecera(10,"Cant");
		$this->TituloCabecera(20,"PrecioVenta");
		$this->TituloCabecera(20,"SubTotal");
        }
	}
}
include_once("../../basededatos.php");

$sql="SELECT * FROM Venta WHERE nombre LIKE '$nombre%' and ci LIKE '$ci%' and (fecharegistro BETWEEN '$fechaventainicio' and '$fechaventafin') and activo=1 ORDER BY fecharegistro,horaregistro";
$reg=consulta($sql);
//echo $sql;

//print_r($reg);
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$t=0;
foreach($reg as $r){$i++;
	
	/*$sql="SELECT * FROM Venta WHERE nombre LIKE '$nombre%' and ci LIKE '$ci%' and (fecharegistro BETWEEN '$fechaventainicio' and '$fechaventafin') and activo=1 ORDER BY horaregistro";
	$reg=consulta($sql);*/



	if($i%2==0){$b=1;}else{$b=0;}
	$t+=$r['total'];
	$pdf->CuadroCuerpo(5,$i,$b,"R",1,"9");
	$pdf->CuadroCuerpo(30,$r['nombre'],$b,"",1,"9");
	$pdf->CuadroCuerpo(20,$r['ci'],$b,"",1,"9");
	$pdf->CuadroCuerpo(20,$r['fecharegistro'],$b,"",1,"9");
	$pdf->CuadroCuerpo(20,number_format($r['total'],2),$b,"R",1,"9","");
    if($detalle==1){
        $pdf->CuadroCuerpo(90,"Detalle",$b,"C",1,"9","BU");

    
        $sql="SELECT * FROM ventadetalle WHERE codventa = '".$r['codventa']."'  and activo=1 ORDER BY horaregistro";
        $re=consulta($sql);
        
        foreach($re as $rvd){
            $sql="SELECT * FROM producto WHERE codproducto='".$rvd['codproducto']."' and activo=1";
            $regproducto=consulta($sql);
            $rp=array_shift($regproducto);
            $pdf->ln();
            $pdf->CuadroCuerpo(95,"");
            $pdf->CuadroCuerpo(40,$rp['nombre'],$b,"",1);
            $pdf->CuadroCuerpo(10,$rvd['cantidad'],$b,"R",1);
            $pdf->CuadroCuerpo(20,number_format($rvd['precioventa'],2),$b,"R",1);
            $pdf->CuadroCuerpo(20,number_format($rvd['total'],2),$b,"R",1); 
        }
    }
    $pdf->ln();
}
$pdf->CuadroCuerpo(75,"Total",1,"R",1,"","B");
$pdf->CuadroCuerpo(20,number_format($t,2),1,"R",1,"","B");
$pdf->Output();
?>