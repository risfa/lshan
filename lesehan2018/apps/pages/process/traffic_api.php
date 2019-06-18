<?php

session_start();
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

// $session_idlokasi = '$_SESSION['IdLokasi']';


//,'$jumlah_pengunjung' Jumlah_Pengunjung

$Jumlah_Pengunjung = $_POST['Jumlah_Pengunjung'];
$motor = $_POST['motor'];
$mobil = $_POST['mobil'];
$lainnya = $_POST['lainnya'];
$date = date('Y-m-d h:i:s');
$session_idlokasi = $_SESSION['id_lokasi'];
$session_idspg = $_SESSION['id_spg'];
// echo $jumlah_pengunjung.'-'.$motor.'-'.$mobil.'-'.$lainnya;
 
	 $sql = "INSERT INTO tb_traffic_kendaraan(IdTrafficKendaraan,IdLokasi,IdSpg,Jumlah_Pengunjung,Mobil,Motor,Lainnya,Waktu) VALUES(null,'$session_idlokasi','$session_idspg','$Jumlah_Pengunjung','$mobil','$motor','$lainnya',null)";  
 if(mysqli_query($connect, $sql))  
 {  
 		// echo "sukses";
 		echo json_encode(array('result' => 'succes'));
 }else{


 		echo json_encode(array('result' => 'error'));

 }  




?>