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
				$this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(0,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
                $this->Image(base_url().'assets/images/baf.png', 8, 25,'40','20','png');
                
                $this->Ln(12);
                $this->setFont('Arial','',14);
                $this->setFillColor(255,255,255);
                $this->cell(130,6,'',0,0,'C',0); 
                $this->cell(14,6,'PT. BUSSAN AUTO FINANCE',0,1,'C',1); 
                $this->cell(87,6,'',0,0,'C',0); 
                $this->cell(100,6,"DETAIL REPORT ASSET",0,1,'C',1); 
				 $this->cell(87,6,'',0,0,'C',0); 
				 // $this->cell(100,6,$data1,0,1,'C',1);
                // $this->cell(25,6,'',0,0,'C',0); 
                
                $this->Ln(10);
				
	}
 
	function Content($data,$data1,$data2,$data3,$data4,$data5,$data6)
	{
		$tglawaldari = date_create($data4);
		$tgldari = date_format($tglawaldari,"d-m-Y");
		
		$tglawalke = date_create($data5);
		$tglke = date_format($tglawalke,"d-m-Y");
		
		if($data3=="1"){
			$data3= "Aktif";
		} else {
			if($data3=="0"){
				$data3= "Tidak Aktif";
			}else{
				$data3= "ALL";
			}
		
		}
		$this->setFont('Arial','',10);
		$this->cell(10,10,'Branch       : '.$data1) ;
		$this->Ln(7);
		$this->cell(10,10,'Tipe Asset   : '.$data2) ;
		$this->Ln(7);
		$this->cell(10,10,'Status Asset : '.$data3) ;
		$this->Ln(10);
		
		
		$this->setFont('Arial','',12);
		$this->setFillColor(0,79,183);
		$this->setTextColor(255,255,255);
		$this->cell(342,10,'Purchase Date '.$tgldari.' To '.$tglke,0,0,'C',1);
		$this->Ln(10);
		
		
		$this->setFont('Arial','',8);
		$this->setFillColor(255,255,255);
		$this->setTextColor(63,52,51,100);
		$this->cell(5,10,'No.',1,0,'C',1);
		$this->cell(15,10,'Branch',1,0,'C',1);
		$this->cell(20,10,'Barcode',1,0,'C',1);
		$this->cell(25,10,'Nama Asset',1,0,'C',1);
		$this->cell(18,10,'Tipe Asset',1,0,'C',1);
		$this->cell(20,10,'IMEI',1,0,'C',1);
		$this->cell(30,10,'Status Smartphone',1,0,'C',1);
		$this->cell(20,10,'No. SIMCard',1,0,'C',1);
		$this->cell(30,10,'Purchase Price',1,0,'C',1);
		$this->cell(30,10,'Purchase Date',1,0,'C',1);
		$this->cell(30,10,'Input Date',1,0,'C',1);
		$this->cell(30,10,'NIK',1,0,'C',1);
		$this->cell(20,10,'Domain',1,0,'C',1);
		$this->cell(27,10,'Posisi',1,0,'C',1);
		$this->cell(22,10,'Asset Condition',1,0,'C',1);
		$this->Ln(10);
	
		$no = 1;
		//print_r($data2);
		foreach($data as $u)  
		{
			
		$tglawalpurch = date_create($u['ASSET_DATE']);
		$tglpurch = date_format($tglawalpurch,"d-m-Y");

		$tglawalasset = date_create($u['DTM_CRT']);
		$tglasset = date_format($tglawalasset,"d-m-Y");
		
		
		if (!$u['NIK'] or is_array($u['NIK']) or $u['NIK']=='Array'){
				$u['NIK'] = "-";
		    }else{
				$u['NIK'] = $u['NIK'];
		}
		
		if (!$u['DOMAIN'] or is_array($u['DOMAIN']) or $u['DOMAIN']=='Array'){
				$u['DOMAIN'] = "-";
		    }else{
				$u['DOMAIN'] = $u['DOMAIN'];
		}
		if (!$u['POSISI'] or is_array($u['POSISI']) or $u['POSISI']=='Array'){
				$u['POSISI'] = "-";
		    }else{
				$u['POSISI'] = $u['POSISI'];
		}
		if (!$u['ASSET_COND'] or is_array($u['ASSET_COND']) or $u['ASSET_COND']=='Array'){
				$u['ASSET_COND'] = "-";
		    }else{
				$u['ASSET_COND'] = $u['ASSET_COND'];
		}
		if (!$u['STAT'] or is_array($u['STAT']) or $u['STAT']=='Array'){
				$u['STAT'] = "-";
		    }else{
				$u['STAT'] = $u['STAT'];
		}
		if (!$u['ASSET_IMEI'] or is_array($u['ASSET_IMEI']) or $u['ASSET_IMEI']=='Array'){
				$u['ASSET_IMEI'] = "-";
		    }else{
				$u['ASSET_IMEI'] = $u['ASSET_IMEI'];
		}
		if (!$u['NO_SIMCARD'] or is_array($u['NO_SIMCARD']) or $u['NO_SIMCARD']=='Array'){
				$u['NO_SIMCARD'] = "-";
		    }else{
				$u['NO_SIMCARD'] = $u['NO_SIMCARD'];
		}
				
			
		if($u['ASSET_COND']=='USE'){
			$u['ASSET_COND']= "DIGUNAKAN";
		} else if ($u['ASSET_COND']=='NOE'){
			$u['ASSET_COND']="TIDAK DIGUNAKAN";
		} else if ($u['ASSET_COND']=='BRE'){
			$u['ASSET_COND']= "RUSAK";
		} else if ($u['ASSET_COND']=='SLD'){
			$u['ASSET_COND']= "DIJUAL";
		} else if ($u['ASSET_COND']=='CYC'){
			$u['ASSET_COND']= "DIMUSNAHKAN";
		} else if ($u['ASSET_COND']=='LOS'){
			$u['ASSET_COND']= "HILANG";
		}
		
		$this->cell(5,10,$no++,1,0,'C',1);
		$this->cell(15,10,$u['LOCATION'],1,0,'C',1);
		$this->cell(20,10,$u['BARCODE_ASSET'],1,0,'C',1);
		$this->cell(25,10,$u['ASSET_NAME'],1,0,'C',1);
		$this->cell(18,10,$u['TYPE_ASSET_ID'],1,0,'C',1);
		$this->cell(20,10,$u['ASSET_IMEI'],1,0,'C',1);
		$this->cell(30,10,$u['STAT'],1,0,'C',1);
		$this->cell(20,10,$u['NO_SIMCARD'],1,0,'C',1);
		$this->cell(30,10,'Rp.'.number_format($u['ASSET_PRICE']),1,0,'C',1);
		$this->cell(30,10,$u['tglpurch'],1,0,'C',1);
		$this->cell(30,10,$u['tglinput'],1,0,'C',1);
		$this->cell(30,10,$u['NIK'],1,0,'C',1);
		$this->cell(20,10,$u['DOMAIN'],1,0,'C',1);
		$this->cell(27,10,$u['POSISI'],1,0,'C',1);
		$this->cell(22,10,$u['ASSET_COND'],1,0,'C',1);
		$this->Ln(10);

		// $this->Ln(10);
		// $this->cell(5,10,'-',1,0,'C',1);
		// $this->cell(15,10,'-',1,0,'C',1);
		// $this->cell(20,10,'-',1,0,'C',1);
		// $this->cell(25,10,'-',1,0,'C',1);
		// $this->cell(18,10,'-',1,0,'C',1);
		// $this->cell(20,10,'-',1,0,'C',1);
		// $this->cell(30,10,'-',1,0,'C',1);
		// $this->cell(20,10,'-',1,0,'C',1);
		// $this->cell(30,10,'-',1,0,'C',1);
		// $this->cell(30,10,'-',1,0,'C',1);
		// $this->cell(30,10,'-',1,0,'C',1);
		// $this->cell(30,10,'-',1,0,'C',1);
		// $this->cell(20,10,'-',1,0,'C',1);
		// $this->cell(27,10,'-',1,0,'C',1);
		// $this->cell(22,10,'-',1,0,'C',1);
		// $this->Ln(10);
		}
		$this->Ln(10);
		
		
		
    }
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		// //buat garis horizontal
		// $this->Line(10,$this->GetY(),215,$this->GetY());
		
		//Arial italic 9
		$this->SetFont('Arial','I',9);
        $this->Cell(0,10,'GA And Insurance ' . date('Y'),0,0,'P');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data,$data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8);
$pdf->Output();