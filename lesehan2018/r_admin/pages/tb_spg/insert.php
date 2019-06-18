<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_spg(Nama, Jabatan, Telepon, Password, Username,IdLokasi) VALUES('".$_GET["Nama"]."', '".$_GET["Jabatan"]."', '".$_GET["Telepon"]."', '".md5($_GET["Password"])."', '".$_GET["Username"]."', '".$_GET["IdLokasi"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted ';  
 }  
 ?> 