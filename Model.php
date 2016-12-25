<?php
class Model{

  private $place;
  private $destination;
  private $array=array();
  private $state_set;
  private $state_place;
  private $page;
  private $error;
  private $box;
  private $price;
  private $button;
  private $stateFifth;
  private $update;
  private $idUpdate;

  public function __construct($destination='',$place='',$state=False,$page='First_page.php',$state_place=0,$error=False,$box=False,$price=0, $button=[], $stateFifth='0',$update=False){
    $this->place=$place;
    $this->destination=$destination;
    $this->state=$state;
    $this->page=$page;
    $this->state_place=$state_place;
    $this->error=$error;
    $this->box=$box;
    $this->price=$price;
    $this->buttonList=$button;
    $this->stateFifth=$stateFifth;
    $this->update=$update;
  }
  //Returns the number place
  public function getPlace(){
    return $this->place;
  }
  //Returns the destination
  public function getDestination(){
    return $this->destination;
  }
  //Saves the destination
  public function setDestination($destination){
    $this->destination=$destination;
  }
  //Saves the number of place
  public function setPlace($place){
    $this->place=$place;
  }
  //Add an element to the array of name and age
  public function addArray($element){
    array_push($this->array,$element);
  }
  //If the number of place is less than or equal to 10 then this function returns True
  public function analysePlace($place){
    if((int)$place<=10 && is_numeric($place)){
      return True;
    }
    return False;
  }
  //This function returns True if one of the elements in the array is not a string.
  //This function also computes the total price of the journey depending of the age and if the assurance has been added
  public function analyseArray($array){
    for($i=0;$i<count($array);$i++){
      if(is_numeric($array[$i]) || $array[$i]=="" || (int)($array[$i+1])<=0 || (int)($array[$i+1])>=100){
        $this->price=0;
        return True;
      }
      elseif((int)($array[$i+1])<=12){
        $this->price=$this->price+10;
      }
      else{
        $this->price=$this->price+15;
      }
      //For one loop the function analyses 2 elements
      $i=$i+1;
    }
    if($this->box){
      $this->price=$this->price+20;
    }
    return False;
  }
  public function getArray(){
    if($this->state_place==0){
      return $this->array;
    }
    //The function adds new empty entries if needed
    else{
      for($i=0;$i<$this->state_place*2;$i++){
        array_push($this->array,'');
      }
      $this->state_place=0;
      return $this->array;
    }
  }
  //Saves the array containing name and age of the different customers
  public function setArray($array){
    $this->array=$array;
  }
  //Sets the current page
  public function setPage($page){
    $this->page=$page;
  }
  //Retrieve the current page
  public function currentPage(){
    return $this->page;
  }
  //State related to the button "annuler".
  public function setState($state){
    $this->state=$state;
  }
  //Returns True if the button 'annuler' has been pressed
  public function state(){
    return $this->state;
  }
  //Compares a number of place and the saved number of place, sets a the difference between the two numbers.
  public function comparePlace($place){
    if($place==$this->place){
      $this->state_place=0;
    }
    elseif($place==0){
      $this->state_place=0;
    }
    elseif($place>$this->place){
      $this->state_place=$place-$this->place;
    }
  }
  //Error related with the input text
  public function setErrorText($error){
    $this->error=$error;
  }
  //Returns True if the user types something wrong
  public function getErrorText(){
    return $this->error;
  }
  //If this function is set to True, the assurance is valid
  public function setBox($box){
    $this->box=$box;
  }
  //Returns True if the checkbox has been marked
  public function getBox(){
    return $this->box;
  }
  //Retrieves the total price
  public function getPrice(){
    return $this->price;
  }
  //Set the price
  public function setPrice($price){
    $this->price=$price;
  }
  //Returns True if the 'Editer' button has been pressed in 'Fifth_page.php'
  public function stateUpdate(){
    return $this->update;
  }
  //Set the button 'Editer'
  public function setStateUpdate($update){
    $this->update=$update;
  }
  //Returns the wanted id to be suppressed or edited
  public function idUpdate(){
    return $this->idUpdate;
  }
  //Sets the current id to be suppressed or edited
  public function setIdUpdate($idUpdate){
    $this->idUpdate=$idUpdate;
  }
}
?>
