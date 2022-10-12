<?php
class Employe{
    public $name="Potter";
    private $salary=20;
    function showName(){
        echo "Employee name is $this->name";
    }
}
class Programmer extends Employe{
    private $language= "php";
    function changeLang($lang){
    $this->language=$lang;
    }
}
$Sam=new Employe();
echo $Sam->name="Harry<br>";
$Mas=new Programmer();
echo $Mas->showName();
?>