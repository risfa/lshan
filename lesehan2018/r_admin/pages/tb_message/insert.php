<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_message (Judul,Message,IdLokasi,Keterangan) VALUES('".$_GET["Judul"]."', '".$_GET["Message"]."', '".$_GET["IdLokasi"]."', '".$_GET["Keterangan"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted ';  
 }  
 ?> 