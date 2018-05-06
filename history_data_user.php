<?php 

//ini_set('display_errors', true);
$sql = "SELECT user_name,user_email,id_user,user_type  FROM users"; 
function connectDB(){

        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "superiorf";

    $conexion = mysqli_connect($server, $user, $pass,$bd);

        if($conexion){
            echo 'La conexion de la base de datos se ha hecho satisfactoriamente
';
        }else{
            echo 'Ha sucedido un error inexperado en la conexion de la base de datos
';
        }

    return $conexion;
}

function disconnectDB($conexion){

    $close = mysqli_close($conexion);

        if($close){
            echo 'La desconexion de la base de datos se ha hecho satisfactoriamente
';
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos
';
        }   

    return $close;
}

function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();

    //generamos la consulta

        mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($conexion,$sql)) die(); //si la conexión cancelar programa
    
    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $row_array['user_name']=$row['user_name'];
        $row_array['user_email']=$row['user_email'];
        $row_array['id_user']=$row['id_user'];
        $row_array['user_type']=$row['user_type'];
        array_push($rawdata,$row_array);
        /*$rawdata[$i]=$row;
                $i++;
    */        
    }

    disconnectDB($conexion); //desconectamos la base de datos

    return $rawdata; //devolvemos el array
}

        $myArray = getArraySQL($sql);
      echo json_encode($myArray);
?>