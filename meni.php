<header id="header-nav" role="banner">
    <div id="navbar" class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><i class="fa fa-book color-brown"></i> <strong>e<strong>Biblioteka</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav flot-nav">
                <li><a href="index.php"><i class="fa fa-home color-brown"></i> Slobodne knjige</a></li>
                <?php if(empty($_SESSION['ulogovaniRadnik'])){
                  ?>
                  <li><a href="login.php"><i class="fa fa-users color-brown"></i> Login</a></li>
                  <?php
                }else{
                  if($_SESSION['ulogovaniRadnik']['ulogaID'] == 1){
                    ?>
                    <li><a href="dodajRadnika.php"><i class="fa fa-check color-brown"></i> Dodaj radnika</a></li>
                    <li><a href="administracija.php"><i class="fa fa-check color-brown"></i> Administracija biblioteke</a></li>
                    <?php
                  }
                  ?>
                  <li><a href="dodajClana.php"><i class="fa fa-user color-brown"></i> Dodaj novog clana</a></li>
                  <li><a href="iznajmiKnjigu.php"><i class="fa fa-book color-brown"></i> Iznajmi knjigu</a></li>
                  <li><a href="logout.php"><i class="fa fa-users color-brown"></i> Logout</a></li>
                  <?php
                } ?>
            </ul>
        </div>
    </div>
</header>
