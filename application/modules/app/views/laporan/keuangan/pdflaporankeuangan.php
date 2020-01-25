<?php
class PDF extends FPDF
{
	function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
}
	// print_r($data2);die;
	//Page header
	function Header()
	{
				// $this->setFont('Arial','',10);
                // $this->setFillColor(255,255,255);
                // $this->cell(0,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
                // $this->Image(base_url().'assets/images/baf.png', 8, 25,'40','20','png');
                
                $this->Ln(12);
                $this->setFont('Arial','B',12);
                $this->setFillColor(255,255,255);
                $this->cell(90,6,'',0,0,'C',0); 
                $this->cell(14,6,'RT. 007 RW. 003',0,1,'C',1); 
                $this->cell(87,6,'',0,0,'C',0); 
                $this->cell(20,6,"KEL. KEBON PALA-KEC. MAKASAR",0,1,'C',1); 
				 $this->cell(87,6,'',0,0,'C',0); 
				 $this->cell(20,6,"JAKARTA TIMUR",0,1,'C',1);
				 $this->Ln(5);
				 $this->setFont('Arial','',12);
				 $this->setFillColor(0,0,0);
				 // $this->setTextColor(255,255,255);
				 $this->cell(20);
				 $this->cell(150,2,'',0,0,'C',1);
				 $this->Ln(3);
				 $this->cell(20);
				 $this->cell(150,0,'',0,1,'C',1);
				

				 $this->Ln(10);
			
				
                
				
	}
 
	function Content($data1,$data2)
	{
		        $this->setFont('Arial','B',12);
                $this->setFillColor(255,255,255);
               
				 $this->cell(87,6,'',0,0,'C',0); 
				 $this->cell(20,6,"LAPORAN KEUANGAN",0,1,'C',1);
				//  $this->Ln(1);
				 $this->setFont('Arial','',12);
				 $this->setFillColor(0,0,0);
				 $this->cell(75);
                 $this->cell(43,0,'',0,1,'C',1);
                //  foreach($data1 as $u)  
		        // {
                 $this->setFont('Arial','',10);
                 $this->setFillColor(255,255,255);
				 $this->cell(83,6,'',0,0,'C',0); 
				 $this->cell(20,6,"RT. 007 RW. 003",'C',1);
                // }
                $this->Ln(7);
                
                $this->cell(20);
                $this->setFillColor(0,79,183);
		        $this->setTextColor(255,255,255);
                $this->cell(10,10,'No',1,0,'C',1);
                $this->cell(50,10,'Uraian',1,0,'C',1);
                $this->cell(30,10,'Pemasukan',1,0,'C',1);
                $this->cell(30,10,'Pengeluaran',1,0,'C',1);
                $this->cell(30,10,'Saldo Akhir',1,0,'C',1);
               
                
                $this->Ln(10);
                $this->setFont('Arial','',8);
                $this->setFillColor(255,255,255);
                $this->setTextColor(63,52,51,100);
                $no = 1;
                // //print_r($data2);
                $totaldebit = 0;
                $totalkredit = 0;
                foreach($data1 as $u)  
                {
                    $this->cell(20);
                $this->cell(10,10,$no++,1,0,'C',1);
                $this->cell(50,10,$u->ket_transaksi.$u->item_transaksi,1,0,'C',1);
                $this->cell(30,10,$u->saldo_debit,1,0,'C',1);
                $this->cell(30,10,$u->saldo_kredit,1,0,'C',1);
                if ($u->saldo_debit != 0){
                    $this->cell(30,10,$u->saldo_debit,1,0,'C',1);
                }else if ($u->saldo_kredit != 0){
                    $this->cell(30,10,$u->saldo_kredit,1,0,'C',1);
                }else{
                    $this->cell(30,10,"0",1,0,'C',1);
                }
                // $this->cell(30,10,$u->saldo_akhir,1,0,'C',1);
                $totaldebit = $totaldebit + $u->saldo_debit;
                $totalkredit = $totalkredit + $u->saldo_kredit;
                $this->Ln(10);
                }
               
                $this->cell(20);
                
                $this->cell(10,10,'',1,0,'C',1);
                $this->cell(50,10,'Total',1,0,'C',1);
                $this->cell(30,10,$totaldebit,1,0,'C',1);
                $this->cell(30,10,$totalkredit,1,0,'C',1);
                $this->cell(30,10,$totaldebit - $totalkredit,1,0,'C',1);
                //  $this->Ln(13);
                
                // $this->cell(81,6,'',0,0,'C',0); 
                // // $this->WordWrap($text,120);
                //  $this->cell(20,6,"Demikian surat keterangan ini kami buat agar dapat dipergunakan sebagaimana mestinya",0,1,'C',1);
                 
                 $this->Ln(13);
                $this->cell(146,6,'',0,0,'C',0);
                 $this->cell(20,6,"Jakarta, ".date("d-m-Y"),0,1,'C',1);

                 $this->Ln(13);
                 $this->cell(26,6,'',0,0,'C',0);
                  $this->cell(50,6,"Ketua RW.003            "."                                                                                 Ketua RT.007",0,1,'L',1);
                // $this->CellFitSpaceForce(0,10,"Ketua RW.003 Ketua RT.007",1,1,'',1);
                //   $this->cell(26,6,'',0,0,'C',0);
                //   $this->cell(20,6,"Ketua RT.007 ",0,1,'R',1);
                 

                 $this->Ln(10);
                //}
		
		// $this->setFont('Arial','',12);
		// // $this->setFillColor(0,79,183);
		// // $this->setTextColor(255,255,255);
		// $this->cell(20);
		// $this->cell(150,2,'',0,0,'C',1);
		// $this->Ln(10);
        // foreach($data1 as $u)  
		// {
		
        //}
		


		
		
		
		
    }
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		// //buat garis horizontal
		// $this->Line(10,$this->GetY(),215,$this->GetY());
		
		//Arial italic 9
		// $this->SetFont('Arial','I',9);
        // $this->Cell(0,10,'GA And Insurance ' . date('Y'),0,0,'P');
		// //nomor halaman
		// $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data1);
$pdf->Output();