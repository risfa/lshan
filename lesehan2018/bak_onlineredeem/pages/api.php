<?php

mysql_connect("localhost","dapps","l1m4d1g1t") or die("Cant Connect to Server");
mysql_select_db("dapps_joker_pertamina_lesehan2018") or die("Cant Found Database");


$status_spesial = $_POST['status_spesial'];
$id_spbu = $_POST['id_spbu'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];

//FOr udin, tambahin ini buat bikin token yak abis simpen data
// mysqli_query($connect,"UPDATE `tb_token_voucher` SET `Token` = '$token_universal' WHERE `tb_token_voucher`.`NoVoucher` = $voucher;");


// raffle

if($status_spesial == 0){
		//HADIAH GAK SPESIAL KARENA BELI KURANG DARI NOMINAL
	$sql = ("SELECT * FROM `tb_hadiah` WHERE `prosentase_menang` != 0 AND status_hadiah = 'AKTIF'  AND jumlah_hadiah != 0 AND id_spbu = '$id_spbu' AND hadiah_spesial = '0' AND kategori_hadiah = '3' ORDER BY RAND()");
}else{
		//HADIAH SPESIAL
	if($jenis_kendaraan == "Motor"){
		$sql = ("SELECT * FROM `tb_hadiah` WHERE `prosentase_menang` != 0 AND status_hadiah = 'AKTIF'  AND jumlah_hadiah != 0 AND id_spbu = '$id_spbu'  AND (kategori_hadiah = '3' OR kategori_hadiah ='2') ORDER BY RAND()");
	}else if($jenis_kendaraan == "Mobil"){
		$sql = ("SELECT * FROM `tb_hadiah` WHERE `prosentase_menang` != 0 AND status_hadiah = 'AKTIF'  AND jumlah_hadiah != 0 AND id_spbu = '$id_spbu'  AND (kategori_hadiah = '3' OR kategori_hadiah ='1') ORDER BY RAND()");
	}
}

// echo "<br>".$sql;
$query = mysql_fetch_array(mysql_query($sql));
$varible_rand = $query['1'];
$kode_hadiah = $query['0'];

if($varible_rand==""){
	$varible_rand = "Hadiah Hiburan";
}

$data_hadiah = mysql_fetch_array(mysql_query("SELECT * FROM tb_hadiah WHERE id_hadiah = '$kode_hadiah' AND id_spbu = '$id_spbu'"));
$jumlah_hadiah_baru = $data_hadiah['jumlah_hadiah'] -= 1; 


		mysql_query("UPDATE tb_hadiah SET jumlah_hadiah = '$jumlah_hadiah_baru' WHERE id_hadiah = '$kode_hadiah' AND id_spbu = '$_POST[id_spbu]'");
		mysql_query("UPDATE `tb_transaksi` SET `hadiahnya` = '$varible_rand' WHERE `tb_transaksi`.`id_transaksi` = '$_POST[id_transaksi]'");

echo json_encode($arrayName = array('hadiah' => $varible_rand, 'kode_hadiah' => $kode_hadiah,'jumlah_hadiah' => $jumlah_hadiah_baru));


if ($jumlah_hadiah_baru <= 0) {
	mysql_query("UPDATE tb_hadiah SET status_hadiah = 'DISAKTIF' WHERE id_hadiah = '$kode_hadiah' AND id_spbu = '$_POST[id_spbu]'");
}

?>