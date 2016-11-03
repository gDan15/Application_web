<?php
class Model{
  private $place;
  private $destination;
  private $array=array();
  private $state;
  public function __construct($destination='',$place='',$state=False){
    $this->place=$place;
    $this->destination=$destination;
    $this->state=$state;
  }
  public function getPlace(){
    return $this->place;
  }
  public function getDestination(){
    return $this->destination;
  }
  public function setDestination($destination){
    $this->destination=$destination;
  }
  public function setPlace($place){
    $this->place=$place;
  }
  public function addArray($element){
    array_push($this->array,$element);
  }
  public function getArray(){
    return $this->array;
  }
  public function setArray($array){
    $this->array=$array;
  }
  // public function getNomArray(){
  //   return $this->Nom;
  // }
  // public function setAgeArray($age){
  //   $this->Age=$age;
  // }
  // public function getAgeArray(){
  //   return $this->Age;
  // }
  public function setState($state){
    $this->state=$state;
  }
  public function state(){
    return $this->state;
  }
  public function displayArray(){
    foreach($this->array as $value){
      echo '<br>';
      echo $value;
    }
  }
}


?>
