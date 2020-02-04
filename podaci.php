<?php
include 'konekcija.php';
$upit = "SELECT u.nazivUloge,count(r.ulogaID) as brojPojavljivanja from radnik r join uloga u on r.ulogaID = u.ulogaID group by u.ulogaID";
$rezultat = $konekcija->query($upit);
$niz = [];
while($red = $rezultat->fetch_assoc()){
  array_push($niz,$red);
}
echo(json_encode($niz));
 ?>
