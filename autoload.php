<?php
class MyClass1{
public function __construct()
{
   echo 'gjnjgjg<br>'; 
}
}
class MyClass2{
    public function __construct()
{
    echo 'dokokod';
}
}
function __autoload($class){
    include "$class.'.php.'";
}
$obj  = new MyClass1();
$obj2 = new MyClass2(); 
?>