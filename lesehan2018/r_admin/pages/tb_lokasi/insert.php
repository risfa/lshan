<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 // $sql = "INSERT INTO  tb_lokasi(IdLokasi,Lokasi,Latitude,Longitude) VALUES(null, $_GET[Lokasi], $_GET[Latitude],$_GET[Longitude])";  

  $sql = "INSERT INTO  tb_lokasi(IdLokasi,Lokasi,Latitude,Longitude) VALUES(null,'".$_GET["Lokasi"]."','".$_GET["Latitude"]."','".$_GET["Longitude"]."')";  


 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted ';  
 }  
 ?> 