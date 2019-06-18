<?php
session_start();

$nomor_telepon = $_GET['nomor_telepon'];
$nama_lengkap = $_GET['nama_lengkap'];
// $testimoni = $_GET['testimoni'];
$id_lokasi = $_SESSION['id_lokasi'];


 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_customer(IdCustomer,Nama,Telepon,Alamat,Sumber,Email,Password) VALUES(null, '$nama_lengkap','$nomor_telepon','-','posko','-','-')";  




 if(mysqli_query($connect, $sql))  
 {  
 	$last_id_customer = mysqli_insert_id($connect);
	// echo 'data inserted'. $_GET['nama_lengkap'].'-'.$_GET['nomor_telepon'];
	// echo json_encode(arary('status' => $last_id_customer, 'last_id_customer' => $last_id_customer));
	echo $last_id_customer;

	 $sql1 = "INSERT INTO tb_transaksi(IdCustomer) VALUES('$last_id_customer')";  
	 mysqli_query($connect,$sql1);

	 // $sql2 = "INSERT INTO tb_buku_tamu values (null,'$nama_lengkap','Umum','$testimoni', '$id_lokasi', null )";
	 // mysqli_query($connect,$sql2);

 }  




?>