<?php
class Radnik
{
  public $radnikID;
  public $imePrezime;
  public $username;
  public $password;
  public $uloga;

  function __construct($radnikID,$imePrezime,$username,$password,$uloga) {
			$this->radnikID = $radnikID;
      $this->imePrezime = $imePrezime;
      $this->username = $username;
      $this->password = $password;
      $this->uloga = $uloga;
		}

    function proveriUlogu(){
      return $uloga->ulogaID;
    }
}



 ?>
