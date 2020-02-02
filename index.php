<?php
  include 'sesija.php';

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
  <?php
   include 'meni.php'; ?>


    <section id="about-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
                    <div class="text-center">
                        <h1><i class="fa fa-book small-icons bk-color-blue"></i>Slobodne knjige</h1>
                        <div id="slobodne"></div>
                    </div>
                    <div class="margintop10">
                      <a href="generisiPDF.php" class="form-control btn-success text-center">Odstampaj ponudu knjiga</a>
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
    <script>
      $.ajax({
        url: "kontroler.php",
        data: {zahtev : "slobodneKnjige"},
        success: function(json){
          var text = "<table class='table table-hover'><thead><tr><th class='text-center'>Naziv</th><th class='text-center'>Autor</th><th class='text-center'>Zanr</th><th class='text-center'>Izdanje</th></tr></thead><tbody>";
          $.each(JSON.parse(json),function(i,element){
              text+="<tr>";
              text+="<td>"+element.naziv+"</td>";
              text+="<td>"+element.autor+"</td>";
              text+="<td>"+element.zanr+"</td>";
              text+="<td>"+element.izdanje+"</td>";
              text+="</tr>";
          });

          text += "</tbody></table>";

          $("#slobodne").html(text);
        }
      });
    </script>
    <script>
      $.ajax({
        type: 'GET',
        url: 'https://quotes.rest/qod',
        headers: {
            "Accept": "application/json"
        }
      }).done(function(data) {
        $("#qod").html(data.contents.quotes[0].quote+" - "+data.contents.quotes[0].author);
      });
      </script>
</body>
</html>
