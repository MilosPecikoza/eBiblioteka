<?php
  include 'sesija.php';
  include 'konekcija.php';
  include 'klase/uloga.php';
  include 'klase/radnik.php';

  if($_SESSION['ulogovaniRadnik']['ulogaID'] != 1){
    header("Location:index.php");
  }

  $poruka = "";

  if(isset($_POST['dodaj'])){
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $ime = trim($_POST['imePrezime']);
    $uloga = trim($_POST['uloga']);
    //$upit = "INSERT INTO radnik(imePrezime,username,password,ulogaID) VALUES ('$ime','$user','$pass',$uloga)";
    //$rezultat = $konekcija->query($upit);

    $podaci = Array ("username" => trim($_POST['username']), "password" => trim($_POST['password']),"imePrezime" => trim($_POST['imePrezime']),"uloga" => trim($_POST['uloga']));

      $json = json_encode($podaci);
			$curl = curl_init("http://localhost/ebiblioteka/api/noviRadnik");
			curl_setopt($curl, CURLOPT_POST, TRUE);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$jsonOdgovor = curl_exec($curl);
			curl_close($curl);
			if($jsonOdgovor == "Uspesno") {
        $poruka = "Uspesno ste dodali novog radnika";
			}
			else {
				$poruka = "Neuspesno dodavanje novog radnika";
			}


    //if($rezultat){
    //  $poruka = "Uspesno ste dodali novog radnika";
  //  }else{
    //  $poruka = "Neuspesno dodavanje novog radnika";
  //  }

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
                        <h1><i class="fa fa-book small-icons bk-color-brown"></i>Dodavanje radnika forma</h1>
                        <form method="POST" action="">
                          <label for="imePrezime">Ime i prezime</label>
                          <input type="text" name="imePrezime" class="form-control">
                          <label for="username">Username</label>
                          <input type="text" name="username" class="form-control">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control">
                          <label for="uloga">Uloga</label>
                          <select name="uloga" class="form-control">
                            <?php
                            //$upit1 = "SELECT * FROM uloga";
                            $json = json_encode($podaci);
                      			$curl = curl_init("http://localhost/ebiblioteka/api/uloge");
                      			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                      			$jsonOdgovor = curl_exec($curl);
                            $podaci = json_decode($jsonOdgovor);
                      			curl_close($curl);
                          //  $rezultat = $konekcija->query($upit1);
                            foreach($podaci as $jedanRed){
                              ?>
                              <option value="<?php echo $jedanRed->ulogaID ?>"><?php echo $jedanRed->nazivUloge ?></option>
                              <?php
                            }

                             ?>
                          </select>
                          <label for="submit"></label>
                          <input type="submit" name="dodaj" value="Dodaj radnika" class="btn btn-lg btn-default margintop10">
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
