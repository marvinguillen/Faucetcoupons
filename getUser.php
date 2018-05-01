<?php 
include("./connex.php");

	$user_name    = $_POST['user_name'];
    $user_email   = $_POST['user_email'];
    $user_cell      = $_POST['user_cell'];
	$user_address = $_POST['user_address'];
	$response     = array();
//	$cnn          = include;
	  $user_codigo_secret = $_POST['user_codigo_secret'];
	  
	if($user_address != null)
	{
		$query = "SELECT * FROM tbl_creator_coupons_details WHERE cod_coupons = '$user_codigo_secret' ";
		//"SELECT * FROM users WHERE user_email = '$user_address' or user_address = '$user_address'";
		if (!$result = mysqli_query($cnn, $query))
        exit(mysqli_error($conn));
	    if(mysqli_num_rows($result) > 0)
	    {
	    	

	    	while($row = mysqli_fetch_assoc($result))
	    	{
	    		$response = $row;
	    	}

        
	    }else{
	    		$response['status'] = 404;
				$response['message'] = "Invalid Request !";	
	    }
	    $query = "INSERT INTO tbl_coupons_codes (id_code, username, user_email, user_address, cellphone) VALUES 
                ('$user_codigo_secret','$user_name','$user_email','$user_address','$user_cell')";
                 if(!$result = mysqli_query($cnn,$query)) 
                {
                    exit(mysqli_error($cnn));
                }
		

	    header('Content-type: application/json; charset=utf8');
    	echo json_encode($response);
	}
	else{
				$response['status'] = 404;
				$response['message'] = "Invalid Request !";	
	}

 ?>