<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "UPDATE  tb_hadiah set Status = '".$_GET["status"]."' WHERE IdHadiah = '".$_GET["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Update';  
 }  
 ?>