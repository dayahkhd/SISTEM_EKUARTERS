<?php
session_start();

require('../fpdf.php');
require('../../../conskklab.php');
//require('../../checklogged.php');

$u    = $_SESSION['uid'];
$ptj  = $_SESSION['ptj'];
$ptj2 = $_SESSION['ptj2'];

$labid = $_GET['lid']; 

$qu = mysql_query("select * from user where id = '$u'");
$du = mysql_fetch_array($qu);

$qlab       =   mysql_query("select * from labkeputusan where labidlabk = '$labid'");
$dlab       =   mysql_fetch_array($qlab);

class PDF extends FPDF
{
    const DPI = 96;
    const MM_IN_INCH = 25.4;
    const A4_HEIGHT = 210;
    const A4_WIDTH = 80;
    const MAX_WIDTH = 150;
    const MAX_HEIGHT = 150;
            
    //1st function[SETTING A4 PAPER]
    function pixelsToMM($val) 
    {
        return $val * self::MM_IN_INCH / self::DPI;
    }
          
    //2nd funtion [FIT A4 PAPER]
    function resizeToFit($imgFilename) 
    {
        list($width, $height) = getimagesize($imgFilename);
        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;
        $scale = min($widthScale, $heightScale);
        return array
        (
            round($this->pixelsToMM($scale * $width)),
            round($this->pixelsToMM($scale * $height))
        );
    }

    //HEADER
    function header() 
    {
        if ($this->page == 1)
        {
          //KKM
          //$image_file = K_PATH_IMAGES.'header1.jpg';
          //$this->Image($image_file, 10, 10, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            $this->SetFont('Times','B',11);
            $this->Cell(0,10,'KEMENTERIAN KESIHATAN MALAYSIA',0,0,'C');
            
            $this->Ln(5);
            $this->Cell(0,10,'BORANG KEPUTUSAN MAKMAL',0,0,'C');
        }
    }
             
    //HEADER
    function body() 
    {

        // FORMAT ASAL $this->Cell(95,10,'No Dokumen :',1,0,'L');
        
        /*
            +++++++++++++++++++++++++++++++++++++++++++++
                    1. MAKLUMAT PESAKIT
            +++++++++++++++++++++++++++++++++++++++++++++
        */
        $this->SetFont('Times','B',11);

        $this->Ln(13);
        $this->Cell(190,6,'MAKLUMAT PESAKIT',1,0,'L');

        $this->SetFont('Times','',9);
        $this->Ln(6);
        $this->Cell(25,7,'Nama :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L'); 
        $this->Cell(25,7,'RN :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');
		
		$this->Ln(7);
        $this->Cell(25,7,'No Dokumen :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');        
        $this->Cell(25,7,'Umur :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');
		
		/*
            +++++++++++++++++++++++++++++++++++++++++++++
                    2. MAKLUMAT ORDER
            +++++++++++++++++++++++++++++++++++++++++++++
        */
        $this->SetFont('Times','B',11);

        $this->Ln(13);
        $this->Cell(190,6,'ORDER INFORMATION',1,0,'L');

        $this->SetFont('Times','',9);
        $this->Ln(6);
        $this->Cell(25,7,'OrderID :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L'); 
        $this->Cell(25,7,'',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');
		
		$this->Ln(7);
        $this->Cell(25,7,'Date & Time :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');        
        $this->Cell(25,7,'Order By :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');
		
		/*
            +++++++++++++++++++++++++++++++++++++++++++++
                    3. SPECIMEN INFORMATION
            +++++++++++++++++++++++++++++++++++++++++++++
        */
		
		$this->SetFont('Times','',9);
        $this->Ln(7);
        $this->Cell(25,7,'Disipline :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');         
        $this->Cell(25,7,'Specimen Information :',1,0,'L');
        $this->Cell(70,7,"",1,0,'L');
		
		/*
            +++++++++++++++++++++++++++++++++++++++++++++
                    4. SAMPLE TAG
            +++++++++++++++++++++++++++++++++++++++++++++
        */
		
		$this->SetFont('Times','B',11);
        $this->Ln(13);
        $this->Cell(63,7,'Sample Tag:',1,0,'L');
        $this->Cell(63,7,'Name',1,0,'L');
        $this->Cell(63,7,'Date & TIme',1,0,'L');
		
		$this->SetFont('Times','',9);
		$this->Ln(7);
        $this->Cell(63,7,'',1,0,'L');
        $this->Cell(63,7,'',1,0,'L');
        $this->Cell(63,7,'',1,0,'L');
    }
              
}
            
$pdf = new PDF();
$pdf->AddPage("P");
$pdf->body();
          
$pdf->Output();
?>
