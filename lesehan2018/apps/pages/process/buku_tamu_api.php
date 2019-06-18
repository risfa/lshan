<?php

session_start();
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  



$NamaLengkap = $_POST['NamaLengkap'];
$DariMana = $_POST['DariMana'];
$Testimoni = $_POST['Testimoni'];
$session_idlokasi = $_SESSION['id_lokasi'];

 
	 $sql = "INSERT INTO tb_buku_tamu(Id,NamaLengkap,DariMana,Testimoni,IdLokasi,Waktu) VALUES(null,'$NamaLengkap','$DariMana','$Testimoni','$session_idlokasi',null)";  
 if(mysqli_query($connect, $sql))  
 {  
 		// echo "sukses";
 		echo json_encode(array('result' => 'succes'));
 }else{


 		echo json_encode(array('result' => 'error'));

 }  




?>