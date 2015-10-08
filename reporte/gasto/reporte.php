<?php
include_once("../../basededatos.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Gastos";
class PDF extends PPDF{
	function Cabecera(){
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(140,"Detalle");
		$this->TituloCabecera(30,"Total");
	}
}
include_once("../../basededatos.php");
$fechagasto=$_GET['fechagasto'];
$sql="SELECT * FROM gasto WHERE fechagasto LIKE '$fechagasto' and activo=1 ORDER BY horaregistro";
//echo $sql;
$reg=consulta($sql);

$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$t=0;
foreach($reg as $r){$i++;
	if($i%2==0){$b=1;}else{$b=0;}
	$t+=$r['subtotal'];
	$pdf->CuadroCuerpo(10,$i,$b,"R",1,"");
	$pdf->CuadroCuerpo(140,$r['detalle'],$b,"",1,"");
	$pdf->CuadroCuerpo(30,number_format($r['subtotal'],2),$b,"R",1,"");
	$pdf->ln();
}
$pdf->CuadroCuerpo(150,"Total",1,"R",1,"B");
$pdf->CuadroCuerpo(30,number_format($t,2),1,"R",1,"B");
$pdf->Output();
?>