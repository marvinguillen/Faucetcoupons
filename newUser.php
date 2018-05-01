<?php 
include ("./connex.php"); //include db connection. import $cnn variable.

    $user_name    = $_POST['user_name'];
    $user_email   = $_POST['user_email'];
    $user_cell      = $_POST['user_cell'];
    $user_address = $_POST['user_address'];
    $user_codigo_secret = $_POST['user_codigo_secret'];
    $succes  = false;
    $response= array();

    $type    = 0; //user_type will be 0 by default as player 1 will be donate member

 if($user_name != null && $user_email != null && $user_cell != null && $user_address != null &&   $user_codigo_secret != null)   
 {
	$query = "SELECT * FROM tbl_creator_coupons_details WHERE cod_coupons = '$user_codigo_secret' ";
	if (!$result = mysqli_query($cnn, $query))
        exit(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$response = $row;
    	}
        
                 $query2 = "INSERT INTO tbl_coupons_codes(id_code, username, user_email, user_address, cellphone) VALUES 
                ('$user_codigo_secret','$user_name','$user_email','$user_address','$user_cell')";
                 if(!$result = mysqli_query($cnn,$query2)) 
                {
                    exit(mysqli_error($cnn));
                }
                
                $response['status'] = 200;

                $response['message'] = "Succes !";
                $succes = true;

    }
    else
    {
    	/*$salted = "4566654jyttgdjgghjygg".$user_pw."yqwsx6890d"; //encryptin pw
        $hashed = hash("sha512", $salted); //encryptin pw
    	*/
       //  alert("Estoy en  newuser parte else.php");
        $query = "SELECT * FROM tbl_creator_coupons_details WHERE cod_coupons = '$user_codigo_secret'  ";
         
    	if(!$result = mysqli_query($cnn,$query)) 
    	{
    		exit(mysqli_error($cnn));
    	}else{

               
                $response['status'] = 200;

                $response['message'] = "Succes !";
                $succes = true;

                

        }

        if ($succes) {


         $response['status'] = 404;
         $response['message'] = "The event has been reported to the erroneous code history!";
         
                $query = "INSERT INTO tbl_history_register_cuopons(user_name, user_email, user_address, user_phone, user_id_code, user_observation) VALUES ('$user_name','$user_email','$user_address','$user_cell','$user_codigo_secret','No se ha encontrado el codigo del cupon')";
                 if(!$result = mysqli_query($cnn,$query)) 
                {
                    exit(mysqli_error($cnn));
                }else{

                    $response['status'] = 404;

                        //$response['message'] = "El evento ha sido reportado al historial de codigo erroneos !";

                        //header("location: index.html")  
                         
                           // header('refresh:10; index.html');

                }
                

        }

        
       

    }

    header('Content-type: application/json; charset=utf8');
    echo json_encode($response);
    //echo "Salida";
}
else
{
	$response['status'] = 404;
	$response['message'] = "Invalid Request !";
}

 ?>