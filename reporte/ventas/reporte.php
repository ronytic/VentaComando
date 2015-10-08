<?php
include_once("../../basededatos.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Ventas";
$fechaventainicio=$_GET['fechaventainicio'];
$fechaventafin=$_GET['fechaventafin'];
$nombre=$_GET['nombre'];
$ci=$_GET['ci'];

class PDF extends PPDF{
	function Cabecera(){
		global $fechaventainicio,$fechaventafin;
		$this->CuadroCabecera(30,"Fecha Desde:",20,$fechaventainicio);
		$this->CuadroCabecera(20,"Hasta:",20,$fechaventafin);
		$this->ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(40,"Nombre");
		$this->TituloCabecera(20,"C.I.");
		$this->TituloCabecera(20,"FechaVenta");
		$this->TituloCabecera(20,"Total");

		/*
		$this->TituloCabecera(30,"Producto");
		$this->TituloCabecera(10,"Cant");
		$this->TituloCabecera(20,"PrecioVenta");
		$this->TituloCabecera(20,"SubTotal");
		*/
	}
}
include_once("../../basededatos.php");

$sql="SELECT * FROM Venta WHERE nombre LIKE '$nombre%' and ci LIKE '$ci%' and (fecharegistro BETWEEN '$fechaventainicio' and '$fechaventafin') and activo=1 ORDER BY horaregistro";
$reg=consulta($sql);
//echo $sql;

//print_r($reg);
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$t=0;
foreach($reg as $r){$i++;
	
	$sql="SELECT * FROM Venta WHERE nombre LIKE '$nombre%' and ci LIKE '$ci%' and (fecharegistro BETWEEN '$fechaventainicio' and '$fechaventafin') and activo=1 ORDER BY horaregistro";
	$reg=consulta($sql);



	if($i%2==0){$b=1;}else{$b=0;}
	$t+=$r['total'];
	$pdf->CuadroCuerpo(10,$i,$b,"R",1,"");
	$pdf->CuadroCuerpo(40,$r['nombre'],$b,"",1,"");
	$pdf->CuadroCuerpo(20,$r['ci'],$b,"",1,"");
	$pdf->CuadroCuerpo(20,$r['fecharegistro'],$b,"",1,"");
	$pdf->CuadroCuerpo(20,number_format($r['total'],2),$b,"R",1,"");
	$pdf->ln();


	$sql="SELECT * FROM ventadetalle WHERE ci LIKE '$ci%'  and activo=1 ORDER BY horaregistro";
//echo $sql;
$reg=consulta($sql);


	//$pdf->ln();
}
$pdf->CuadroCuerpo(90,"Total",1,"R",1,"B");
$pdf->CuadroCuerpo(20,number_format($t,2),1,"R",1,"B");
$pdf->Output();
?>