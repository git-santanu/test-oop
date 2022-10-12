<?php
$db_name="mysql:host=localhost;dbname=crud;";
$username="root";
$password="";
$conn = new PDO($db_name,$username,$password);
$sql=$conn->query("select * from crudtest");
while($row=$sql->fetch(PDO::FETCH_NUM)){
    echo "{$row[0]} - {$row[1]} - {$row[2]} - {$row[3]} - {$row[4]} <br>";
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
}
?>