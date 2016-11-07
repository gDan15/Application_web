<?php
class Model{

  private $place;
  private $destination;
  private $array=array();
  private $state_set;
  private $state_place;
  private $page;
  private $error=[];

  public function __construct($destination='',$place='',$state=False,$page='',$state_place=0){
    $this->place=$place;
    $this->destination=$destination;
    $this->state=$state;
    $this->page=$page;
    $this->state_place=$state_place;
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
    if($this->state_place==0){
      return $this->array;
    }
    //Rajoute des entrées vide si le nouveau nombre est plus grand que l'ancien nombre.
    else{
      for($i=0;$i<$this->state_place*2;$i++){
        array_push($this->array,'');
      }
      $this->state_place=0;
      return $this->array;
    }
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
  public function comparePlace($place){
    if($place==$this->place){
      $this->state_place=0;
    }
    elseif($place==0){
      $this->state_place=0;
    }
    else{
      if($place>$this->place){
        $this->state_place=$place-$this->place;
      }
    }
  }
  public function displayArray(){
    foreach($this->array as $value){
      echo '<br>';
      echo $value;
    }
  }
}


?>
