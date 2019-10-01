<?php   
  require_once 'connection.php';  
 
 $response = array();  
 $check_array = array('name','personal_contact','CNIC','gender','org_address','org_contact','user_name','email','password','cnic_image' , 'certification_image','category');


     if (isTheseParametersAvailable($check_array)){


            $name =$_POST['name'];
            $personal_contact =$_POST['personal_contact'];
            $CNIC =$_POST['CNIC'];
            $org_address =$_POST['org_address'];
            $org_contact =$_POST['org_contact'];
            $cnic_image = $_POST['cnic_image'];
            $certification_image=$_POST['certification_image'];       
            $username = $_POST['user_name'];   
            $email = $_POST['email'];   
            $password = md5($_POST['password']);    
            $gender = $_POST['gender']; 
            $category = $_POST['category']; 

           
            $query_check = "SELECT id FROM user_data WHERE email='$email' ";
            $result_check = mysqli_query($conn, $query_check) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result_check);
           if ($count == 0){ 
 
                 $query_insert=" INSERT INTO user_data( name, personal_contact, CNIC, cnic_image, certification_image , gender, org_address, org_contact, user_name,category,email, password) VALUES                                    ('$name', '$personal_contact', '$CNIC', '$cnic_image' , '$certification_image', '$gender','$org_address', '$org_contact' , '$username' ,'$category','$email','$password' )";
                 

                 $result_insert =  mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
                
                 $response['error'] = 'false'; 
                 $response['message'] = 'User registered successfully';  
            }else{
                
                 $response['error'] = 'true'; 
           	     $response['message'] = 'User already exists';  

                 }

        } else{
                 $response['error'] = 'true'; 
           	     $response['message'] = 'Invalid data!';  

        }
    

 function isTheseParametersAvailable($params){  
   foreach($params as $param){  
       if(!isset($_POST[$param])){  
           return false;   
          } else return true; 
    }
 }     
 echo json_encode(array("response"=>$response));


?>  