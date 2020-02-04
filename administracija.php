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
  <?php include 'meni.php'; ?>


    <section id="about-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
                    <div class="text-center">
                        <h1><i class="fa fa-book small-icons bk-color-brown"></i>Kasnjenja</h1>
                        <div id="kasnjenja"></div>
                        <h1>Tabela clanova</h1>
                        <table id="clanovi" class='table table-hover'>
                          <thead>
                            <tr>
                              <th class='text-center'>Ime</th>
                              <th class='text-center'>Prezime</th>
                              <th class='text-center'>Adresa</th>
                              <th class='text-center'>Broj telefona</th>
                              <th class='text-center'>Email</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                foreach($niz as $n){
                                  ?>
                                  <tr>
                                    <td><?php echo $n->ime ?> </td>
                                    <td><?php echo $n->prezime ?> </td>
                                    <td><?php echo $n->adresa ?> </td>
                                    <td><?php echo $n->brojTelefona ?> </td>
                                    <td><?php echo $n->email ?> </td>
                                  </tr>

                                  <?php
                                }
                             ?>
                          </tbody>
                        </table>
                        <h1>Charts</h1>
                        <div id="piechart"></div>
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
      $.ajax({
        url: "kontroler.php",
        data: {zahtev : "kasnjenja"},
        success: function(json){
          var text = "<table class='table table-hover'><thead><tr><th class='text-center'>Clan</th><th class='text-center'>Knjiga</th><th class='text-center'>Datum od:</th><th class='text-center'>Broj telefona</th><th class='text-center'>Brisanje</th></tr></thead><tbody>";
          $.each(JSON.parse(json),function(i,element){
              text+="<tr>";
              text+="<td>"+element.clan.ime + " "+element.clan.prezime+"</td>";
              text+="<td>"+element.knjiga.naziv+"</td>";
              text+="<td>"+element.datumOd+"</td>";
              text+="<td>"+element.clan.brojTelefona+"</td>";
              text+="<td><a href='obrisiRent.php?rentID="+element.rentID+"' class='btn btn-danger'>Obrisi</a></td>";
              text+="</tr>";
          });

          text += "</tbody></table>";

          $("#kasnjenja").html(text);
        }
      });
    </script>
    <script>
    $(document).ready(function(){
      $('#clanovi').DataTable();
    });
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var podaci = [];
        var naslov = ["Naziv","Broj"];
        podaci.push(naslov);
        $.ajax({
          url: "podaci.php",
          success: function(json){
            $.each(JSON.parse(json),function(i,element){
              var niz = [element.nazivUloge,parseInt(element.brojPojavljivanja)];
              podaci.push(niz);
            })
            var data = google.visualization.arrayToDataTable(podaci);
            console.log(data);

            var options = {'title':'Broj uloga radnika', 'width':600, 'height':500,pieHole: 0.3};

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);

          }
        });

      }
</script>
<script>
  $.ajax({
    url: "generisiTemperaturu.php",
    success: function(json){
      var pomocna = JSON.parse(json);
      var temp =Math.round(pomocna.main['temp'] - 273.15); 
      temp ="Temperatura je trenutno: "+temp+ " Celzijusa";
      $("#qod").html(temp);
    }
  })
</script>  
</body>
</html>
