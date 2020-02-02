<?php
class Knjiga
{
  public $knjigaID;
  public $naziv;
  public $autor;
  public $zanr;
  public $izdanje;
  public $zauzeta;

  function __construct($knjigaID,$naziv,$autor,$zanr,$izdanje,$zauzeta) {
			$this->knjigaID = $knjigaID;
      $this->naziv = $naziv;
      $this->autor = $autor;
      $this->zanr = $zanr;
      $this->izdanje = $izdanje;
      $this->zauzeta = $zauzeta;
		}
}



 ?>
