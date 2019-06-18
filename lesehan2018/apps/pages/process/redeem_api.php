<?php

$nomor_telepon = $_GET['nomor_telepon'];
$nama_lengkap = $_GET['nama_lengkap'];
$alamat = $_GET['alamat'];
$kategori = $_GET['kategori'];
$redeem_vocher = $_GET['redeem_vocher'];
$id_spg = $_GET['id_spg'];
$id_lokasi = $_GET['id_lokasi'];
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO tb_customer(IdCustomer,Nama,Telepon,Alamat,Sumber,Email,Password) VALUES(null, '$nama_lengkap','$nomor_telepon','$alamat','posko','-','-')";  




 if(mysqli_query($connect, $sql))  
 {  
 	$last_id_customer = mysqli_insert_id($connect);
	// echo 'data inserted'. $_GET['nama_lengkap'].'-'.$_GET['nomor_telepon'];
	// echo json_encode(arary('status' => $last_id_customer, 'last_id_customer' => $last_id_customer));
	echo $last_id_customer;

	 $sql1 = "UPDATE tb_token_voucher set  IdCustomer = $last_id_customer, Kategori = '$kategori', Petugas = '$id_spg',Reedem = 'Offline', IdLokasi = '$id_lokasi',time_stamp = null where NoVoucher = '$redeem_vocher'  ";  

	 if(mysqli_query($connect,$sql1)){

								    // send wa
								$substr_telepon = substr($nomor_telepon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Terimakasih anda telah mengikuti program Ketupat Enduro ', // Message
									];
									$json = json_encode($data); // Encode data to JSON
									// URL for request POST /message
									// $url = 'https://foo.chat-api.com/message?token=zi7pqa923z0lw7jw';

									$url = 'https://eu2.chat-api.com/instance3416/message?token=vz7p7nyzeayqnhn4';

									// Make a POST request
									$options = stream_context_create(['http' => [
									        'method'  => 'POST',
									        'header'  => 'Content-type: application/json',
									        'content' => $json
									    ]
									]);
									// Send a request
									$result = file_get_contents($url, false, $options);

									// end send wa

									
	 		echo '<script>swal({
				title: "berhasil update! #redeem_api.php",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=redeem";
				});
	 		</script>';

	 			// echo "berhasil update";
	 }

 }  





?>