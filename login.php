<?php   
  require_once 'connection.php';  
 
 $response = array();  

     if ( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['category']) ){

            $category = $_POST['category'];   
            $email = $_POST['email'];   
            $password = md5($_POST['password']);    
           
           
            $query_check = "SELECT name ,email,personal_contact,category FROM user_data WHERE email='$email' and password='$password' and category='$category' ";
            $result_check = mysqli_query($conn, $query_check) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result_check);
           if ($count == 1){ 
 
                
                while($row = $result_check->fetch_assoc()){
                      $data[] = $row;
                 }
                 $dataa = $data;
               
                 $response['data'] = $dataa; 
                 $response['error'] = 'false'; 
                 $response['message'] = 'Login successful';  
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