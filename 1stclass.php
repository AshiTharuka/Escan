
<?php
require('fdpf/fpdf.php.php');//Download fpdf and set the path of it here......
$db = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
{
ob_start();
class myPDF extends FPDF{
	function header()
	{
		//$this->Image('logo.png',$x=105, $y=5, $w=20,$h=20	);	
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'AIGBIRTH TEA FACTORY ',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',14);
		$this->Cell(276,10,'Colombo',0,0,'C');
		$this->Ln(20);
		
	
		}
		
		function footer()
	{
		
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
		
		
		function headerTable()
		{
			$this->SetFont('Times','B',12);
			$this->Cell(30,10,'ID',1,0,'C');
			$this->Cell(50,10,'Email',1,0,'C'); 
			$this->Cell(20,10,'Weight',1,0,'C');
			$this->Cell(40,10,'Staff',1,0,'C');
			$this->Cell(30,10,'Price',1,0,'C');
			$this->Cell(30,10,'Branch',1,0,'C');
			$this->Cell(20,10,'KG',1,0,'C');
			$this->Cell(30,10,'Type',1,0,'C');
			$this->Cell(30,10,'Reduction',1,0,'C');
			$this->Ln();
			}
			
		function viewTable($db)
		{
			$this->SetFont('Times','',12);
			$stmt = $db->query('select * from orders_info where order_id = "1"');
			while($data = $stmt->fetch(PDO::FETCH_OBJ))
			{
				$this->Cell(30,10,$data->order_id,1,0,'C');
			   // $this->Cell(50,10,$data->supplier_email,1,0,'L');
			   // $this->Cell(20,10,$data->weight,1,0,'L');
			    //$this->Cell(40,10,$data->staff,1,0,'L');
			   // $this->Cell(30,10,$data->price,1,0,'L');
				//$this->Cell(30,10,$data->branch,1,0,'L');
				//$this->Cell(20,10,$data->kg,1,0,'L');
				//$this->Cell(30,10,$data->type,1,0,'L');
				//$this->Cell(30,10,$data->reduction,1,0,'L');
			    $this->Ln();
				}
		
			}	
		
	
	}
	
	$pdf= new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A4',0);
	$pdf->headerTable();
	$pdf->viewTable($db);
	$pdf->Output();



}
	ob_end_flush();

