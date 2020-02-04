<?php
  include 'sesija.php';
  include 'konekcija.php';

  $poruka = "";

  if(isset($_POST['dodaj'])){
    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $email = trim($_POST['email']);
    $broj = trim($_POST['broj']);
    $adresa = trim($_POST['adresa']);
    $upit = "INSERT INTO clan(ime,prezime,email,brojTelefona,adresa) VALUES ('$ime','$prezime','$email','$broj','$adresa')";
    $rezultat = $konekcija->query($upit);
    if($rezultat){
      $poruka = "Uspesno ste dodali novog clana";
    }else{
      $poruka = "Neuspesno dodavanje novog clana";
    }

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
</head>

<body>
  <?php include 'meni.php'; ?>


    <section id="about-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
                    <div class="text-center">
                        <h1><i class="fa fa-book small-icons bk-color-brown"></i>Dodavanje clana forma</h1>
                        <form method="POST" action="">
                          <label for="ime">Ime</label>
                          <input type="text" name="ime" class="form-control">
                          <label for="prezime">Prezime</label>
                          <input type="text" name="prezime" class="form-control">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control">
                          <label for="broj">Broj telefona</label>
                          <input type="text" name="broj" class="form-control">
                          <label for="adresa">Adresa</label>
                          <input type="text" name="adresa" class="form-control">
                          <label for="submit"></label>
                          <input type="submit" name="dodaj" value="Dodaj clana" class="btn btn-lg btn-default margintop10">
                        </form>
                        <?php echo $poruka; ?>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="assets/scripts/custom.js"></script>

</body>
</html>
