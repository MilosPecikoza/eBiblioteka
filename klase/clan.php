<?php
class Clan
{
  public $clanID;
  public $ime;
  public $prezime;
  public $email;
  public $brojTelefona;
  public $adresa;

  function __construct($clanID,$ime,$prezime,$email,$brojTelefona,$adresa) {
			$this->clanID = $clanID;
      $this->ime = $ime;
      $this->prezime = $prezime;
      $this->email = $email;
      $this->brojTelefona = $brojTelefona;
      $this->adresa = $adresa;
		}
}
