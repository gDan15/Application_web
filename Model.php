<?php
class Model{
  private $place;
  private $destination;
  public function __construct($destination='Une destination',$place=''){
    $this->place=$place;
    $this->destination=$destination;
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
}
?>
