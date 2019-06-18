<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_admin(Username, Password, Status) VALUES('".$_GET["Username"]."', '".$_GET["Password"]."', '".$_GET["Status"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 