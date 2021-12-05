<?php

try{
// Create connection
$con = new PDO('mysql:host=localhost; dbname=pasf2','root','' );
}
catch(PDOException $e){
	die("<h2 class='text-danger'>There is something went wrong !</h2>");
}
?>