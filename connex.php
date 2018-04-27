<?php  
//Connection Variables
$host = "localhost";
$user = "root";
$password = "MrRobot.2018";
$db = "superiorf";

//Set connection to MySQL
$cnn = mysqli_connect($host,$user,$password,$db);

//Check status
if ($cnn->connect_error) {
	die("Connection Failds: " . $cnn->connect_error);
}
?>