<?php
 $key = "dental";
$mysqli = new mysqli('localhost','root','root','dentalclinic');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
   $key = "dental";

?>
