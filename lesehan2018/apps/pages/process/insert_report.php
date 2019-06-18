<?php

 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

$id_lokasi = $_POST['id_lokasi'];

$Keterangan = $_POST['Keterangan'];


$Message = $_POST['Message'];

	
$query = mysqli_query($connect,"INSERT INTO tb_report values (null, '$Keterangan', '$Message', '$id_lokasi', null) ");
if ($query) {
	echo json_encode(array('flag' => true , 'message' => 'Berhasil Rubah Flag'));
}else{

	echo json_encode(array('flag' => false , 'message' => 'Gagal Kirim report , periksa koneksi anda'));
}


?>