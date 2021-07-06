<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Invoice</title>
</head>
<body>

<?php
require('fdpf/fpdf.php.php');//Download fpdf and set the path of it here......
include("../db.php");

session_start();

//$car="car";
//if($car="car")

if(isset($_SESSION['IDOFTABLE']))
	{


$IDOFTABLE= $_SESSION['IDOFTABLE'];	
 $email= $_SESSION['email'];
 $address= $_SESSION['address'];
 $total_amt=$_SESSION['total_amt'] ;
$prod_count=$_SESSION['prod_count'];
// $bank=$_SESSION['bank'];

// $staff_id=$_SESSION['staff_id'];
// $startdate=$_SESSION['startdate'];
// $endtdate=$_SESSION['endtdate'];

// $weightt="mm";
// $prices= "mm";
// $kgg="mm";
// $reductions="mm";
// $bank="mm";

// $staff_id="mm";
// $startdate="mm";
// $endtdate="mm";

//$sql=mysqli_query($conn,"SELECT * FROM payment_details_db WHERE Payment_ID  = '$id'");

//while($data=mysqli_fetch_array($sql))
//{

//}


$newInvoiceID=rand(3456,9999);
$currentDate=date('dMY');
//$pName= ($First_Name);
ob_start();
$pdf = new FPDF('P','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14); //set font to arial, bold, 14pt
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(128 ,5,'',0,1);//end of line
//Invoice headings58
//$pdf->Cell(50 ,2,$pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 10.00),
$pdf->Cell(68 ,5,'EasyLife(pvt)Ltd ',0,0);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(60 ,5,'Proof Of Dispatch',0,0,'R');
$pdf->Cell(80 ,5,'',0,1);
$pdf->Cell(48 ,5,'',0,1);
//set font
$pdf->SetFont('Times','',12);


$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100 ,5,'Company Details',0,1);//end of line
$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Times','',12);


//invoice infomation
$pdf->Cell(26 ,5,'Address',0,0);
$pdf->Cell(80 ,5,':- Wattala',0,0);
$pdf->Cell(48 ,5,'',0,1);
$pdf->Cell(26 ,5,'Tel',0,0);
$pdf->Cell(80 ,5,':- 077 77 77 777',0,0);
$pdf->Cell(48 ,5,'',0,1);
$pdf->Cell(26 ,5,'Email',0,0);
$pdf->Cell(80 ,5,':- EasyLife@gmail.com',0,0);
$pdf->Cell(48 ,5,'',0,1);
$pdf->Cell(26 ,5,'Date:',0,0);
$pdf->Cell(22 ,5,$currentDate,0,1,'R');
$pdf->Cell(26 ,5,'Receipt No',0,0);
$pdf->Cell(80 ,5,$newInvoiceID,0,1);

//patient details
$pdf->Cell(90 ,5,'',0,1);
$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100 ,5,'Customer Details',0,1);//end of line
$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Times','',12);

$pdf->Cell(35 ,5,'Order Id',0,0);	
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,'',0,0);
$pdf->Cell(90 ,5, $IDOFTABLE,0,1);

//$pdf->Cell(35 ,5,'Customer Phone No',0,0);	
//$pdf->Cell(2 ,5,':   077 77 77 777',0,0);
$pdf->Cell(2 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(35 ,5,'Customer Addres',0,0);	
$pdf->Cell(2 ,5, $address,0,0);
$pdf->Cell(2 ,5,'',0,0);
//$pdf->Cell(90 ,5,$tel,0,1);


$pdf->Cell(90 ,5,'',0,1);
$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100 ,5,'Quantity Details',0,1);
$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Times','',12);

// $pdf->Cell(35 ,5,'Date From',0,0);	
// $pdf->Cell(2 ,5,':',0,0);
// $pdf->Cell(2 ,5,$total_amt,0,0);
//$pdf->Cell(90 ,5,$startdate,0,1);

/*$pdf->Cell(35 ,5,'Date To',0,0);	
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,'',0,0);*/
//$pdf->Cell(90 ,5,$endtdate,0,1);


/*$pdf->Cell(35 ,5,'Weight(KG)',0,0);	
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,'',0,0);*/
//$pdf->Cell(90 ,5,$weightt,0,1);


/*$pdf->Cell(35 ,5,'Price for KG',0,0);	
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,'',0,0);*/
//$pdf->Cell(90 ,5,$kgg,0,1);

/*$pdf->Cell(35 ,5,'Reductions (Rs)',0,0);	
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,'',0,0);*/
//$pdf->Cell(90 ,5,$reductions,0,1);


$pdf->Cell(35 ,5,'Total Payment (Rs)',0,0);	
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,'',0,0);
$pdf->Cell(90 ,5,$total_amt,0,1);








/*$pdf->Cell(35 ,5,'Product quantity',0,0);
$pdf->Cell(2 ,5,': ',0,0);
$pdf->Cell(2 ,5,'',0,0);
$pdf->Cell(90 ,5,$prod_count,0,1);*/


$pdf->Cell(35 ,5,'Product count',0,0);
$pdf->Cell(2 ,5,':',0,0);
$pdf->Cell(2 ,5,$prod_count,0,0);
//$pdf->Cell(90 ,5,$bank,0,1);





$pdf->SetFont('Arial','B',12);
$pdf->Cell(128 ,5,'',0,1);//end of line
$pdf->Cell(128 ,5,'',0,1);//end of line
$pdf->Cell(128 ,5,'----This is the proof of the payment----',0,1,'C');


$pdf->SetFont('Arial','B',8);
$pdf->Cell(100 ,5,'                                   You can use this printed bill as the proof of payment',0,1);
$pdf->Cell(90 ,5,'',0,1);
$pdf->SetFont('Times','',12);



$pdf->Output(); //output the resut
ob_end_flush();
	
	}
?>




</body>
</html>