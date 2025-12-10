<?php require('../fpdf186/invoice.php');session_start();$total=0;$ctotal=0;$i=0;
//Buy and Satisfy YOURSELF
$pdf = new PDF_Invoice('P','mm','A4');$header=array('Sr. No','Product Name','Unit Price','Quantity','Total Price');
$pdf->AddPage();$pdf->addSociete( "E-Shopee","Adress\n" ."75000 Dhaka\n"."R.C.S. Bangladesh\n" ."Capital : BDT 1800000 " );
$pdf->fact_dev( "E-Shopee", "Your Ultimate Online Shop" );$pdf->temporaire( "Buy and Satisfy" );
$pdf->addDate( date("d/m/y") );$pdf->addClient("CL01");$pdf->addPageNumber("1");
if(isset($_POST['submit'])){$address=$_POST['address1'];$country=$_POST['country'];$city=$_POST['city'];$zip=$_POST['zip'];
    $pdf->addClientAdresse($address.",\n"."{$zip},\n".$city.".\n".$country.".\n");}
$pdf->Ln();$pdf->Ln();$pdf->SetFont('Arial','B',16);
$pdf->Cell(0, 10, 'E-Shopee : Your Ultimate Destination for online Shopping', 0, 1, 'C');$pdf->Ln();
$pdf->Ln(10);$pdf->Cell(0, 10, 'Order Number: ' . random_int(1,20), 0, 1);
$pdf->Cell(0, 10, 'Customer Name: ' .$_POST['fname'].' '.$_POST['lname'], 0, 1);$pdf->Ln(10);$w = array(20,70,30,30,40);
    // Header
for($i=0;$i<count($header);$i++)$pdf->Cell($w[$i],7,$header[$i],1,0,'C');$pdf->Ln();
if(isset($_SESSION['cart'])){foreach($_SESSION['cart'] as $key => $value){if (is_array($value)) {
$total=$value['p_price']*$value['p_quantity'];$ctotal+=$total;$i=$key+1;$pdf->SetFont('Arial', '',12);
$pdf->Cell($w[0], 10, $i,'LR',0,'C');$pdf->Cell($w[1],10,$value['p_name'],'LR');
$pdf->Cell($w[2],10,number_format($value['p_price'],2)."Tk ",'LR',0,'R');
$pdf->Cell($w[3],10,number_format($value['p_quantity']),'LR',0,'C');$pdf->Cell($w[4],10,number_format($total,2)."Tk ",'LR',0,'R');
$pdf->Ln();}}$pdf->Cell(array_sum($w),0,'','T');$pdf->Ln();$pdf->SetFont('Arial','B',12);
$pdf->Cell(150, 10, 'Total Price:',1,'','R');$pdf->Cell(40, 10, number_format($ctotal,2)."Tk ",1,'','R');}
$pdf->Ln();$pdf->SetY(-50);$pdf->Cell(80, 10, '', 'T', 0, 'L');$pdf->Cell(100, 10, 'Buyer\'s Signature', 0, 1, 'R');
$pdf->Cell(80, 10, 'Seller\'s Signature', 0, 0, 'L');$pdf->Cell(100, 10, '', 'T', 0, 'R');
// Output PDF to browser
$pdf->Output();