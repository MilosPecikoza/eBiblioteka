<?php
class Rent
{
  public $rentID;
  public $clan;
  public $radnik;
  public $knjiga;
  public $datumOd;
  public $datumDo;

  function __construct($rentID,$clan,$radnik,$knjiga,$datumOd,$datumDo) {
      $this->rentID = $rentID;  
      $this->clan = $clan;
      $this->radnik = $radnik;
      $this->knjiga = $knjiga;
      $this->datumOd = $datumOd;
      $this->datumDo = $datumDo;
		}
}
