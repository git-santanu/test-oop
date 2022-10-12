<?php 
class Player
{
  public $name;
  public $speed = 5;
  public $move = false;
  function setName($name)
  {
    $this->name = $name;
  }
  function getName()
  {
    return $this->name;
  }
  function run()
  {
    $this->move = true;
  }
  function stopRun()
  {
    $this->move = false;
  }
}
$p1 = new Player();
$p1->setName('Santanu');
echo $p1->getName();
?>

