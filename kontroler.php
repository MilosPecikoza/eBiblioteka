<?php
header('Content-Type: text/html; charset=utf-8');
include 'konekcija.php';
include 'klase/knjiga.php';
include 'klase/clan.php';
include 'klase/radnik.php';
include 'klase/uloga.php';
include 'klase/rent.php';


if(isset($_GET['zahtev']) && $_GET['zahtev'] == 'slobodneKnjige'){
  $knjigeNiz = [];
  $upit = "SELECT * FROM knjiga where zauzeta = 0";
  $rezultat = $konekcija->query($upit);
  while($jedanRed = $rezultat->fetch_assoc()){
    $knjiga = new Knjiga($jedanRed['knjigaID'],$jedanRed['naziv'],$jedanRed['autor'],$jedanRed['zanr'],$jedanRed['izdanje'],$jedanRed['zauzeta']);
    array_push($knjigeNiz,$knjiga);
  }

  echo(json_encode($knjigeNiz));
}

if(isset($_GET['zahtev']) && $_GET['zahtev'] == 'kasnjenja'){
  $niz = [];
  $upit = "SELECT * FROM knjiga k join rent r on k.knjigaID = r.knjigaID join clan c on r.clanID=c.clanID join radnik rad on r.radnikID = rad.radnikID join uloga u on rad.ulogaID = u.ulogaID where r.datumDo < NOW() ";
  $rezultat = $konekcija->query($upit);
  while($jedanRed = $rezultat->fetch_assoc()){
    $uloga = new Uloga($jedanRed['ulogaID'],$jedanRed['nazivUloge']);
    $radnik = new Radnik($jedanRed['radnikID'],$jedanRed['imePrezime'],$jedanRed['username'],$jedanRed['password'],$uloga);
    $knjiga = new Knjiga($jedanRed['knjigaID'],$jedanRed['naziv'],$jedanRed['autor'],$jedanRed['zanr'],$jedanRed['izdanje'],$jedanRed['zauzeta']);
    $clan = new Clan($jedanRed['clanID'],$jedanRed['ime'],$jedanRed['prezime'],$jedanRed['email'],$jedanRed['brojTelefona'],$jedanRed['adresa']);
    $rent = new Rent($jedanRed['rentID'],$clan,$radnik,$knjiga,$jedanRed['datumOd'],$jedanRed['datumDo']);
    array_push($niz,$rent);
  }

  echo(json_encode($niz));
}


 ?>
