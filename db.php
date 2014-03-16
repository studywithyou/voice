<?php
/**
 * Created by PhpStorm.
 * User: ptwickler
 * Date: 3/15/14
 * Time: 5:30 PM
 */

$host = 'localhost';
$user = 'ptwickler';
$pw = '123456';
$database = 'friends';


$newf = "Bobby";
$newl = "Lordon";

$command = "INSERT INTO fnames (first, last)  values ('".$newf."', '".$newl."');";




$db = new mysqli($host,$user,$pw,$database)
or die("Cannot connect to MySQL.");

$result =   $db->query($command);

$command = "SELECT first, last FROM fnames;";

if ($result = $db->query($command)) {
  while ($data = $result->fetch_object()) {
    echo $data->first." ";
    echo $data->last."<br>";
  }
  $result->free();
}


$db->close();
?>