<?php
include_once("../../impresion/pdf.php");

$titulo="Reporte de Inventarios";

include_once("../../basededatos.php");

$nombre=$_GET['nombre'];
$codcategoria=$_GET['codcategoria']!=""?$_GET['codcategoria']:'%';
$sql="SELECT * FROM producto WHERE nombre LIKE '$nombre%' and codcategoria LIKE '$codcategoria' and activo=1 ORDER BY nombre";
$reg=consulta($sql);

class PDF extends PPDF{
	function Cabecera(){
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(50,"Producto");
		$this->TituloCabecera(30,"Categoria");
		$this->TituloCabecera(20,"Código");
		$this->TituloCabecera(20,"Talla");
		$this->TituloCabecera(15,"Compra");
		$this->TituloCabecera(15,"Venta");
		$this->TituloCabecera(15,"Stock");
	}
}


$pdf=new PDF("P","mm","letter");
$pdf->AddPage();

foreach($reg as $r){$i++;
	if($i%2==0){$b=1;}else{$b=0;}
	$t+=$r['subtotal'];

	$sql="SELECT * FROM categoria WHERE codcategoria=".$r['codcategoria']." and activo=1 ORDER BY nombre";
	$cat=consulta($sql);
	$c=array_shift($cat);


	$sql="SELECT sum(cantidadstock) as cantidastock FROM compra WHERE codproducto LIKE '".$r['codproducto']."' and activo=1";
	$cantidastock=consulta($sql);
	$cantidastock=array_shift($cantidastock);
	$stock=$cantidastock['cantidastock'];
	if($stock==""){$stock=0;}

	$sql="SELECT sum(cantidad) as cantidacompra FROM compra WHERE codproducto LIKE '".$r['codproducto']."' and activo=1";
	$cantidacompra=consulta($sql);
	$cantidacompra=array_shift($cantidacompra);
	$comprado=$cantidacompra['cantidacompra'];
	if($comprado==""){$comprado=0;}

	$vendido=$comprado-$stock;

	$pdf->CuadroCuerpo(10,$i,$b,"R",1,"");
	$pdf->CuadroCuerpo(50,$r['nombre'],$b,"",1,"");
	$pdf->CuadroCuerpo(30,$c['nombre'],$b,"",1,"");
	$pdf->CuadroCuerpo(20,$r['codigo'],$b,"",1,"");
	$pdf->CuadroCuerpo(20,$r['talla'],$b,"",1,"");
	$pdf->CuadroCuerpo(15,$comprado,$b,"R",1,"");
	$pdf->CuadroCuerpo(15,$vendido,$b,"R",1,"");
	$pdf->CuadroCuerpo(15,$stock,$b,"R",1,"B");
	$pdf->ln();
}


$pdf->Output();
?>