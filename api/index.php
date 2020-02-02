<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){
});

Flight::register('db', 'Database', array('ebiblioteka'));



Flight::route('GET /uloge', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiUloge();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		array_push($niz,$red);
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /clanovi', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiClanove();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		array_push($niz,$red);
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /clanovi/@id', function($id)
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiJednogClana($id);

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		array_push($niz,$red);
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /noviRadnik', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci = file_get_contents('php://input');
	$niz = json_decode($podaci,true);
	$db->unesiRadnika($niz);
	if($db->getResult())
	{
		echo "Uspesno";
	}
	else
	{
		echo  "Greska!";

	}

});


Flight::start();
?>
