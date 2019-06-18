<?php
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  


$IdCustomer = $_POST['IdCustomer'];
$kode_voucher = $_POST['kode_voucher'];
$jenis_oli = $_POST['JenisOli'];

$sql_cek_IdCustomer = "SELECT * FROM tb_token_voucher where NoVoucher = '$kode_voucher' AND Status = '0'";
$query = mysqli_query($connect,$sql_cek_IdCustomer);
$num_rows = mysqli_num_rows($query);
if ($num_rows < 1) {
	/*echo'<script>swal({
				title: "sukses! #result.php/pages",
				type: "success" 
				}, function(){
				document.location.href="index.php?menu=home";
				});
				</script>';*/
	echo json_encode(array('result' => 'Kode Voucher Yang Kamu Masukan Sudah Digunakan','flag' => false));
}else{

	$sql = "UPDATE tb_token_voucher set IdCustomer = '$IdCustomer', Reedem = 'Online', Kategori = '$jenis_oli', Status = '1', time_stamp = current_timestamp() where  NoVoucher = '$kode_voucher'";  
	$sql2 = mysqli_query($connect,"UPDATE tb_customer SET StatusHadiah = 'RAFFLE' WHERE IdCustomer = '$IdCustomer'");
	if(mysqli_query($connect, $sql))  
	{  

		$sql_get_id_transaksi = "SELECT * From tb_token_voucher where NoVoucher = '$kode_voucher' ";
		$query_get = mysqli_query($connect,$sql_get_id_transaksi);
		$result = mysqli_fetch_array($query_get);
		echo json_encode(array('flag' => true,'IdTransaksi' => $result['Id'],'NoVoucher' => $result['NoVoucher'] ));
	}else{
		echo json_encode(array('result' => 'error','flag' => false));

	}  
}

?>