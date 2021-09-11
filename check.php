<?php
$con = mysqli_connect("host", "user", "password", "database_name", 3306);
$response = array();
if($con){
    $license_id = $_GET['license_id'];
    
    if (isset($_GET['license_id']) && $_GET['license_id']!="") {
        $sql = "select * from xf_dbtech_ecommerce_license WHERE license_key LIKE '$license_id'";
        
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['license_key'] = $row ['license_key'];
            $i++;
            
        }
  
         

        if(strpos(json_encode($response,JSON_PRETTY_PRINT), $license_id) !== false){
            echo "Valid License";
        } else{
            echo "Unvalid License";
        }
           
       

            
        
    }
}
else{
    echo "Can't connect to db";


}
?>
