<?php
session_start();

$testimoni = $_GET['testimoni'];
$id_customer = $_GET['id_customer'];


 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_buku_tamu(Id,Testimoni,id_customer,Waktu) VALUES(null,'$testimoni','$id_customer',null)";  




 if(mysqli_query($connect, $sql))  
 {  
	// echo "<script> location.href = 'https://joker.5dapps.com/pertamina/lesehan2018/apps/index.php?menu=survey'; </script>";

 }  




?>