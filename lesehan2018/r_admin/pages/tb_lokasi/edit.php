<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $id = $_GET["id"];   
 $text = $_GET["text"];  
 $column_name = $_GET["column_name"];  
 $sql = "UPDATE  tb_lokasi SET ".$column_name."='".$text."' WHERE IdLokasi='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>