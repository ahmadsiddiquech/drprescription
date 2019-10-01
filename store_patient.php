<?php   
  require_once 'connection.php';  
 
 $response = array();  

     if ( isset($_POST['cnic']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['mDate']) && isset($_POST['disease']) ){

            $cnic = $_POST['cnic'];   
            $name = $_POST['name'];   
            $description = $_POST['description'];    
            $date = $_POST['mDate'];   
            $disease = $_POST['disease'];    
           
         
            $query_insert = "INSERT into patients(cnic,name,disease,description,mDate) values('$cnic','$name','$disease','$description','$date')";

            $result = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
           
           if ($result == true){ 
 ;
                 
                 $response['error'] = 'false'; 
                 $response['message'] = 'Data inserted';  
            }else{
                
                 $response['error'] = 'true'; 
                 $response['message'] = 'Login failed!';  

                 }

        } else{
                 $response['error'] = 'true'; 
                 $response['message'] = 'Invalid data!';  

        }
    



echo json_encode(array("response"=>$response));

?>  