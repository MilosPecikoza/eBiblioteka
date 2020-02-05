<?php
  include 'sesija.php';
  include 'konekcija.php';

  $poruka = "";

  if(isset($_POST['dodaj'])){
    $knjiga = trim($_POST['knjiga']);
    $clan = trim($_POST['clan']);
    $now = date('Y-m-d H:i:s');
    $date = strtotime($now);
    $date = strtotime("+7 day", $date);
    $datumDo = date('Y-m-d H:i:s', $date);
    $radnikID = $_SESSION['ulogovaniRadnik']['radnikID'];
    $upit = "INSERT INTO rent(clanID,knjigaID,radnikID,datumOd,datumDo) VALUES ($clan,$knjiga,$radnikID,'$now','$datumDo')";
    echo $upit;
    $rezultat = $konekcija->query($upit);
    if($rezultat){
      $konekcija->query("UPDATE knjiga SET zauzeta=1 where knjigaID=$knjiga");
      $poruka = "Uspesno ste iznajmili knjigu";
    }else{
      $poruka = "Neuspesno iznajmljivanje";
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
                        <h1><i class="fa fa-book small-icons bk-color-brown"></i>Iznajmi knjigu</h1>
                        <form method="POST" action="">
                          <label for="knjiga">Knjiga</label>
                          <select name="knjiga" class="form-control">
                            <?php
                            $upit1 = "SELECT * FROM knjiga where zauzeta = 0";
                            $rezultat = $konekcija->query($upit1);
                            while($jedanRed = $rezultat->fetch_assoc()){
                              ?>
                              <option value="<?php echo $jedanRed['knjigaID'] ?>"><?php echo $jedanRed['knjigaID'] ?> - <?php echo $jedanRed['naziv'] ?> - <?php echo $jedanRed['autor'] ?></option>
                              <?php
                            }

                             ?>
                          </select>
                          <label for="clan">Clan</label>
                          <select name="clan" class="form-control">
                            <?php
                            $upit2 = "SELECT * FROM clan";
                            $rezultat = $konekcija->query($upit2);
                            while($jedanRed = $rezultat->fetch_assoc()){
                              ?>
                              <option value="<?php echo $jedanRed['clanID'] ?>"><?php echo $jedanRed['ime'] ?>  <?php echo $jedanRed['prezime'] ?></option>
                              <?php
                            }

                             ?>
                          </select>
                          <label for="submit"></label>
                          <input type="submit" name="dodaj" value="Iznajmi knjigu" class="btn btn-lg btn-default margintop10">
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
