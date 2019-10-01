<?php  
$servername = "localhost";  
$username = "id6239145_saadtariqpak";  
$password = "saadtariq";  
$database = "id6239145_api_db";  
$conn = new mysqli($servername, $username, $password, $database);  
if ($conn->connect_error) {  
    echo "Connection failed: "; 
}  
// else{
//     echo "Connection Create";
// }
?>  
