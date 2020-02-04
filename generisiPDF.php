
<?php
header('Content-Type: text/html; charset=utf-8');
require('pdf/tfpdf.php');
$pdf=new tFPDF();
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(60,7,"Naziv");
$pdf->Cell(40,7,"Autor");
$pdf->Cell(40,7,"Zanr");
$pdf->Cell(20,7,"Izdanje");
$pdf->Ln();
$pdf->Cell(450,7,"");
$pdf->Ln();

        include ('konekcija.php');
        include ('klase/knjiga.php');
        $knjigeNiz = [];
        $upit = "SELECT * FROM knjiga where zauzeta = 0";
        $rezultat = $konekcija->query($upit);
        while($jedanRed = $rezultat->fetch_assoc()){
          $knjiga = new Knjiga($jedanRed['knjigaID'],$jedanRed['naziv'],$jedanRed['autor'],$jedanRed['zanr'],$jedanRed['izdanje'],$jedanRed['zauzeta']);
          array_push($knjigeNiz,$knjiga);
        }
        foreach($knjigeNiz as $p){
          $pdf->Cell(60,7,$p->naziv);
          $pdf->Cell(40,7,$p->autor);
          $pdf->Cell(40,7,$p->zanr);
          $pdf->Cell(20,7,$p->izdanje);

          $pdf->Ln();
        }

$pdf->Output();
?>
