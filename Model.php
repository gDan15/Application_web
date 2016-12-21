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
  //If the number of place is less than 10 then this function returns True
  public function analysePlace($place){
    if((int)$place<10 && is_numeric($place)){
      return True;
    }
    return False;
  }
  //Cette fonction va vérifier si les données entrées dans la liste sont bien une suite de string suivit d'un int. Retourne true si un élément n'est pas bon.
  //Cette fonction calcul aussi le prix du voyage en fonction de l'âge des différentes personnes et de l'assurance annulation.
  public function analyseArray($array){
    for($i=0;$i<count($array);$i++){
      // if(gettype($array[$i])!='string' || !is_numeric($array[$i+1]) || $array[$i]=="" || $array[$i+1]=="" || $array[$i+1]=='0')
      if(is_numeric($array[$i]) || $array[$i]=="" || (int)($array[$i+1])<=0 || (int)($array[$i+1])>=100){
      //if(!is_numeric($array[$i]) && $array[$i]!="" && (int)($array[$i+1])>0 && (int)($array[$i+1])<100)
        $this->price=0;
        return True;
      }
      elseif((int)($array[$i+1])<=12){
        $this->price=$this->price+10;
      }
      else{
        $this->price=$this->price+15;
      }
      //On analyse à chaque fois une 'paire' d'élément dans la liste, ce qui fait qu'il faut incrémenter de 2 à chaque itération
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
    elseif($place>$this->place){
      $this->state_place=$place-$this->place;
    }
  }
  public function setErrorText($error){
    $this->error=$error;
  }
  public function getErrorText(){
    return $this->error;
  }
  //If this function is set to True, the assurance is valid
  public function setBox($box){
    $this->box=$box;
  }
  public function getBox(){
    return $this->box;
  }
  public function getPrice(){
    return $this->price;
  }
  public function setPrice($price){
    $this->price=$price;
  }
  public function stateUpdate(){
    return $this->update;
  }
  public function setStateUpdate($update){
    $this->update=$update;
  }
  // //Si il y a un élément vide dans la liste, cette fonction renvoie True
  // public function emptyElement($array){
  //   foreach($array as $element){
  //     //Dès qu'il y a un élément vide, on retourne immédiatement 'True' en quittant la boucle.
  //     if($element==""){
  //       return True;
  //     }
  //   }
  // }
  public function idUpdate(){
    return $this->idUpdate;
  }
  public function setIdUpdate($idUpdate){
    $this->idUpdate=$idUpdate;
  }
  public function displayArray(){
    foreach($this->array as $value){
      echo '<br>';
      echo $value;
    }
  }
}
?>
