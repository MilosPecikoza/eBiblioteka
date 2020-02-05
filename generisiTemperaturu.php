<?php

$curl = curl_init("http://api.openweathermap.org/data/2.5/weather?q=Belgrade&APPID=6ed5b817a20c9a16855a877246d38576");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$jsonOdgovor = curl_exec($curl);
curl_close($curl);
echo($jsonOdgovor);

 ?>
