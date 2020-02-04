<?php
  include 'sesija.php';
  include 'konekcija.php';
  include 'klase/clan.php';
  $niz = [];
  $upit = "SELECT * FROM clan";
  $rezultat = $konekcija->query($upit);
  while($jedanRed = $rezultat->fetch_assoc()){
    $clan = new Clan($jedanRed['clanID'],$jedanRed['ime'],$jedanRed['prezime'],$jedanRed['email'],$jedanRed['brojTelefona'],$jedanRed['adresa']);
    array_push($niz,$clan);
  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EBiblioteka</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>

<body>
  
</body>
</html>
