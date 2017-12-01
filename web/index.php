<?php
namespace ueb05\web;



class Run{
  private $Date;
  private $Distance
  private $Time

  public function __construct($Date, $Distance, $Time){
    $this->Date = $Date;
    $this->Distance = Distance;
    $this->Time = $Time;
  }

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
    else {
      return false;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
    else {
      return false;
    }
  }






}
 ?>
