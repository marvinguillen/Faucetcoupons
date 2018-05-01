<?php
	
	include "config.php";
	session_start();
	if(isset($_POST['enviar']))
	{
		$user	=  	$_POST['user_name'];
		//$pass	= 	$_POST['pass'];
			//printf($user, "     " , $pass);
		Echo "El usuario es " .$user. " ";		
		//$prepare=$db->mysqli->prepare("SELECT * FROM user WHERE user = 'boscan'  and pass = '2020'");
		//$prepare->bind_param('i',$ruid);
		//$resultado = $mysqli->query("SELECT * FROM user WHERE user = '$user'  and pass = '$pass'");
		//$fila = $resultado->fetch_assoc();
		/* 
		if($resultado->num_rows > 0) 
		{
			while($row = $resultado->fetch_assoc()) {
			 				
			 	$_SESSION['user']	=	$row['user'];
			 	$_SESSION['pass']	= 	$row['pass'];
			 	$_SESSION['id']	=	$row['id'];
			 	$_SESSION['rango'] = 	$row['rango'];
			 	header("location:index.php");
			}
		}
		else
		{

			echo "El usuario o la contraseña son invalidos";
			header('refresh:10; login.php');

		}*/
	}
?>