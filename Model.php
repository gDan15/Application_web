<?php
class Model{

  private $place;
  private $destination;
  private $array=array();
  private $state_set;
  private $state_place;
  private $page;
  private $error;

  public function __construct($destination='',$place='',$state=False,$page='First_page.php',$state_place=0,$error=False){
    $this->place=$place;
    $this->destination=$destination;
    $this->state=$state;
    $this->page=$page;
    $this->state_place=$state_place;
    $this->error=$error;
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
  //Cette fonction va vérifier si les données entrées dans la liste sont bien une suite de string suivit d'un int. Retourne true si un élément n'est pas bon.
  public function analyseArray($array){
    for($i=0;$i<count($array);$i++){
      // if(gettype($array[$i])!='string' || !is_numeric($array[$i+1]) || $array[$i]=="" || $array[$i+1]=="" || $array[$i+1]=='0')
      if(is_numeric($array[$i]) || $array[$i]=="" || (int)($array[$i+1])<=0 || (int)($array[$i+1])>=100){
      //if(!is_numeric($array[$i]) && $array[$i]!="" && (int)($array[$i+1])>0 && (int)($array[$i+1])<100)
        return True;
      }
      //On analyse à chaque fois une 'paire' d'élément dans la liste, ce qui fait qu'il faut incrémenter de 2 à chaque itération
      $i=$i+1;
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
  // //Si il y a un élément vide dans la liste, cette fonction renvoie True
  // public function emptyElement($array){
  //   foreach($array as $element){
  //     //Dès qu'il y a un élément vide, on retourne immédiatement 'True' en quittant la boucle.
  //     if($element==""){
  //       return True;
  //     }
  //   }
  // }
  public function displayArray(){
    foreach($this->array as $value){
      echo '<br>';
      echo $value;
    }
  }
}
?>
