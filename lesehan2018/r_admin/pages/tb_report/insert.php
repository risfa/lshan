<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_hadiah(Hadiah, Jumlah,  Awal, Status, kategori) VALUES('".$_GET["Hadiah"]."', '".$_GET["Jumlah"]."' , '".$_GET["Jumlah"]."', 'DISAKTIF', '".$_GET["Kategori"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 