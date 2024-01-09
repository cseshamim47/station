<?php

class Createpdf extends FPDF{
	function Header()
		{
			// Logo
			//$this->Image('logo.png',10,6,30);
			// Arial bold 15
			$this->SetFont('Arial','B',15);
			// Move to the right
			$this->Cell(80);
			// Title
			$this->Cell(30,10,Session::get('sbizlong'),0,0,'C');
			
			$this->Ln(5);
			$this->Cell(80);
			$this->SetFont('Arial','B',8);
			$this->Cell(30,10,Session::get('sbizadd'),0,0,'C');
			
			// Line break
			$this->Ln(15);
			
		}

// Page footer
	function Footer()
		{
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Page number
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	
	function ChapterTitle($num, $label)
		{
		$this->SetFont('Arial','',12);
		$this->SetFillColor(200,220,255);
		$this->Cell(0,6,"$num :$label",0,1,'L',true);
		$this->Ln(0);
		}
	function pdfInvoice($header, $data, $discount, $cash, $card, $xchange)
		{
		//print_r($data); die;
		// Column widths
		$w = array(10, 70, 15, 25, 20, 25, 25);
		$this->SetFont('Arial','',9);
		// Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Data
		$this->SetFont('Arial','',8);
		$total = 0;
		$totdisc = 0;
		$totvat = 0;
		for($i=0; $i<count($data); $i++)
		{
			
			$this->Cell($w[0],6,$i+1,'LR',0,'C');
			$this->Cell($w[1],6,$data[$i][0],'LR');
			$this->Cell($w[2],6,number_format($data[$i][1]),'LR',0,'C');
			$this->Cell($w[3],6,number_format($data[$i][2],2),'LR',0,'R');
			$this->Cell($w[4],6,number_format($data[$i][3],2),'LR',0,'R');
			$this->Cell($w[5],6,number_format($data[$i][4],2),'LR',0,'R');
			$this->Cell($w[6],6,number_format($data[$i][5],2),'LR',0,'R');
			$total += $data[$i][5];
			$totdisc += $data[$i][4];
			$totvat += $data[$i][3];
			$this->Ln();
		}
		
			$this->Cell($w[0],6,"",'LR');
			$this->Cell($w[1],6,"",'LR');
			$this->Cell($w[2],6,"",'LR','R');
			$this->Cell($w[3],6,"",'LR','R');
			$this->Cell($w[4],6,"",'LR','R');
			$this->Cell($w[5],6,"Total",1,'LR','R');
			$this->Cell($w[6],6,number_format($total,2),1,'LR','R');
			$this->Ln();
			/*$this->Cell($w[0],6,"",'LR');
			$this->Cell($w[1],6,"",'LR');
			$this->Cell($w[2],6,"",'LR','R');
			$this->Cell($w[3],6,"",'LR','R');
			$this->Cell($w[4],6,"",'LR','R');
			$this->Cell($w[5],6,"(+)Total VAT",1,'LR','R');
			$this->Cell($w[6],6,number_format($totvat,2),1,'LR','R');
			$this->Ln();
			$this->Cell($w[0],6,"",'LR');
			$this->Cell($w[1],6,"",'LR');
			$this->Cell($w[2],6,"",'LR','R');
			$this->Cell($w[3],6,"",'LR','R');
			$this->Cell($w[4],6,"",'LR','R');
			$this->Cell($w[5],6,"(-)Total Discount",1,'LR','R');
			$this->Cell($w[6],6,number_format($discount+$totdisc,2),1,'LR','R');
			$this->Ln();
			$this->Cell($w[0],6,"",'LR');
			$this->Cell($w[1],6,"",'LR');
			$this->Cell($w[2],6,"",'LR','R');
			$this->Cell($w[3],6,"",'LR','R');
			$this->Cell($w[4],6,"",'LR','R');
			$this->Cell($w[5],6,"G. Total",1,'LR','R');
			$this->Cell($w[6],6,number_format(($total+$totvat)-($discount+$totdisc),2),1,'LR','R');
			$this->Ln();
			$this->Cell($w[0],6,"",'LR');
			$this->Cell($w[1],6,"",'LR');
			$this->Cell($w[2],6,"",'LR','R');
			$this->Cell($w[3],6,"",'LR','R');
			$this->Cell($w[4],6,"",'LR','R');
			$this->Cell($w[5],6,"Cash",1,'LR','R');
			$this->Cell($w[6],6,number_format($cash,2),1,'LR','R');
			$this->Ln();
			$this->Cell($w[0],6,"",'LR');
			$this->Cell($w[1],6,"",'LR');
			$this->Cell($w[2],6,"",'LR','R');
			$this->Cell($w[3],6,"",'LR','R');
			$this->Cell($w[4],6,"",'LR','R');
			$this->Cell($w[5],6,"Cr. Card",1,'LR','R');
			$this->Cell($w[6],6,number_format($card,2),1,'LR','R');
			$this->Ln();*/
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
		$this->Ln(10);
		$inword = explode('.',$total-$discount);	
		$myfunctions = new toWords($inword[0],'Taka');
		
		//echo $myfunctions->words;die;
		$this->Cell(0,5,"Inword : ".$myfunctions->words,0,0,'L');
		$this->Ln(15);
		$this->SetFont('Times','B', 10);
		$this->Cell(0,5,"Autherized Signature",0,0,'R');
		//$this->Line(10, 200, 210-100, 200);
		$this->Ln(15);
		$this->SetFont('Times','U', 8);
		$this->Cell(0,5,"Note : Once Item sold, Cannot be returned.",0,0,'L');
		$this->Ln(15);
		$this->SetFont('Times','B', 10);
		$this->Cell(0,5,"Computer generated invoice. Signature is not required.",0,0,'L');
	}	
}