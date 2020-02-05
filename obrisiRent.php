<?php
include 'sesija.php';
include 'konekcija.php';

$id = $_GET['rentID'];

$rentID = $konekcija->real_escape_string($id);

$upitBrisanje = "delete from rent where rentID=$rentID";
$upitKnjiga = "UPDATE knjiga set zauzeta = 0 where knjigaID = (SELECT knjigaID from rent where rentID=$rentID)";
$konekcija->query($upitKnjiga);
$konekcija->query($upitBrisanje);
header("Location:index.php");
 ?>
