<?php   
  require_once 'connection.php';  
 
 $response = array();  

         
            $query_check = "SELECT *FROM patients  ";
            $result_check = mysqli_query($conn, $query_check) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result_check);
           if ($count > 0){ 
 
                
                while($row = $result_check->fetch_assoc()){
                      $data[] = $row;
                 }
                 $dataa = $data;
               
                 $response['data'] = $dataa; 
                 $response['error'] = 'false'; 
                 $response['message'] = 'success';  
            }else{
                
                 $response['error'] = 'true'; 
                 $response['message'] = 'No data exist!';  

                 }

       



echo json_encode(array("response"=>$response));

?>  