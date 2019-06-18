<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO  tb_hasil_survey(Hasil) VALUES('".$_GET["Hasil"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted ';  
 }  
 ?> 