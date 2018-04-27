<?php 
header('Content-type: application/json; charset=utf8');
include ("./connex.php"); //include db connection. import $cnn variable.

if (($_POST['user_name'] != null) && ($_POST['user_email'] != null) && ($_POST['user_pw'] != null) && ($_POST['user_address']!= null)) 
{
	$user_name    = $_POST['user_name'];
	$user_email   = $_POST['user_email'];
	$user_pw      = $_POST['user_pw'];
	$user_address = $_POST['user_address'];
	$response= array();
	$type    = 0; //user_type will be 0 by default as player 1 will be donate member	
//	$cnn 	 = include 	

	$query = "SELECT * FROM users WHERE user_email = '$user_email' or user_address = '$user_address'";
	if (!$result = mysqli_query($cnn, $query))
        exit(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$response = $row;
    	}
    }
    else
    {
    	$salted = "4566654jyttgdjgghjygg".$user_pw."yqwsx6890d"; //encryptin pw
        $hashed = hash("sha512", $salted); //encryptin pw
    	$query = "INSERT INTO users(user_name,user_email,user_pw,user_address,user_type) VALUES('$user_name','$user_email','$hashed','user_address','$type')";

    	if(!$result = mysqli_query($cnn,$query)) 
    	{
    		exit(mysqli_error($cnn));
    	}

         $response['status'] = 200;
         $response['message'] = "Succes !";

    }

    echo json_encode($response);
}
else
{
	$response['status'] = 404;
	$response['message'] = "Invalid Request !";
}

 ?>