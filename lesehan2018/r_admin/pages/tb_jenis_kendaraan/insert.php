<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO  tb_jenis_kendaraan(Kendaraan) VALUES('".$_GET["Kendaraan"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted ';  
 }  
 ?> 



 