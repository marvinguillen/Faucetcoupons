<?php 
include("./connex.php");

	
	$user_address = $_POST['user_address'];
	$response     = array();
	
	  
	if($user_address != null)
	{
		$query ="SELECT * FROM users WHERE user_email = '$user_email' or user_address = '$user_address'"; 
		
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
	  
	    header('Content-type: application/json; charset=utf8');
    	echo json_encode($response);
	}
	else{
				$response['status'] = 404;
				$response['message'] = "Invalid Request !";	
	}

 ?>