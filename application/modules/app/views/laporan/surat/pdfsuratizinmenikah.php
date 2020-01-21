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
                $this->cell(133,6,'',0,0,'C',0); 
                $this->cell(14,6,'RT. 007 RW. 003',0,1,'C',1); 
                $this->cell(130,6,'',0,0,'C',0); 
                $this->cell(20,6,"KEL. KEBON PALA-KEC. MAKASAR",0,1,'C',1); 
				 $this->cell(130,6,'',0,0,'C',0); 
				 $this->cell(20,6,"JAKARTA TIMUR",0,1,'C',1);
				 $this->Ln(5);
				 $this->setFont('Arial','',12);
				 $this->setFillColor(0,0,0);
				 // $this->setTextColor(255,255,255);
				 $this->cell(20);
				 $this->cell(235,2,'',0,0,'C',1);
				 $this->Ln(3);
				 $this->cell(20);
				 $this->cell(235,0,'',0,1,'C',1);
				

				 $this->Ln(10);
			
				
                
				
	}
 
	function Content($data1)
	{
		        $this->setFont('Arial','B',12);
                $this->setFillColor(255,255,255);
               
				 $this->cell(130,6,'',0,0,'C',0); 
				 $this->cell(20,6,"LAPORAN SURAT IZIN MENIKAH",0,1,'C',1);
				 $this->Ln(1);
				 $this->setFont('Arial','',12);
				 $this->setFillColor(0,0,0);
				 $this->cell(75);
                 $this->cell(43,0,'',0,1,'C',1);

                 $this->setFont('Arial','',8);
                // $this->setFillColor(255,255,255);
                // $this->setTextColor(63,52,51,100);
                $this->setFillColor(0,79,183);
		        $this->setTextColor(255,255,255);
                $this->cell(10,10,'No',1,0,'C',1);
                $this->cell(30,10,'No. Surat',1,0,'C',1);
                $this->cell(30,10,'Tgl. Pengajuan',1,0,'C',1);
                $this->cell(30,10,'No. KTP',1,0,'C',1);
                $this->cell(50,10,'Nama Lengkap',1,0,'C',1);
                $this->cell(70,10,'Nama Ayah',1,0,'C',1);
                $this->cell(55,10,'Nama Ibu',1,0,'C',1);
                
                $this->Ln(10);
                $this->setFont('Arial','',8);
                $this->setFillColor(255,255,255);
                $this->setTextColor(63,52,51,100);
                $no = 1;
                // //print_r($data2);
                foreach($data1 as $u)  
                {
                 
                $this->cell(10,10,$no++,1,0,'C',1);
                $this->cell(30,10,$u->no_surat,1,0,'C',1);
                $this->cell(30,10,$u->tgl_surat,1,0,'C',1);
                $this->cell(30,10,$u->nik_pemohon,1,0,'C',1);
                $this->cell(50,10,$u->wrg_nama,1,0,'C',1);
                $this->cell(70,10,$u->nama_pihak2,1,0,'C',1);
                $this->cell(55,10,$u->nama_pihak3,1,0,'C',1);
                $this->Ln(10);
                }
		
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
$pdf->AddPage('L','A4');
$pdf->Content($data1);
$pdf->Output();