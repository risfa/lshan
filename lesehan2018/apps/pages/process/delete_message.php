<?php

 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

$id = $_POST['id'];
	
$query = mysqli_query($connect,"UPDATE tb_message set Tampilkan = 0 where Id = $id");
if ($query) {
	echo "Berhasil Hapus Message";
}else{
	echo "Error Hapus Message , cek koneksi anda . Lakukan Hapus ulang";
}


?>