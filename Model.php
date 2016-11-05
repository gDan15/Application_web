<?php
class Model{
  private $place;
  private $destination;
  private $array=array();
  private $state;
  private $page;
  public function __construct($destination='',$place='',$state=False,$page=''){
    $this->place=$place;
    $this->destination=$destination;
    $this->state=$state;
    $this->page=$page;
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
  //Permet de mémoriser à quel page on est
  public function setPage($page){
    $this->page=$page;
  }
  //Permet de récuper la page enregistrée
  public function currentPage(){
    return $this->page;
  }
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
