<?php
include 'sesija.php';
include 'konekcija.php';
$poruka = "";

if(isset($_POST['login'])){
  $user = trim($_POST['username']);
  $pass = trim($_POST['password']);

  $upit = "SELECT * FROM radnik as r JOIN uloga as u ON r.ulogaID=u.ulogaID where username = '$user' AND password = '$pass' LIMIT 1";

  $rezultat = $konekcija->query($upit);
  while($jedanRed = $rezultat->fetch_assoc() ){

    $_SESSION['ulogovaniRadnik'] = $jedanRed;
    header("Location: index.php");
    die();
  }

  $poruka = "Radnik ne postoji u bazi";
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>eBiblioteka</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <?php include 'meni.php'; ?>

  <section id = "about-section">
    <div class = "wrap-pad">
      <div class = "row">
        <div class = "col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
          <div class = "text-center">
            <h1> <i class = "fa fa-user small-icons bk-color-brown"> </i> Login forma</h1>
            <form method = "POST" action = "">
              <label for="username" class = "margintop10">Username</label>
              <input type="text" name="username" class = "form-control">

              <label for="password" class = "margintop10">Password</label>
              <input type="password" name="password" class = "form-control">

              <label for="submit"></label>
              <input type="submit" name="login" value="Login" class = "btn btn-lg btn-primary margintop10">
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
