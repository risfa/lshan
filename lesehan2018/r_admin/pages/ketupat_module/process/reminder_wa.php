<?php  
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

$sql_select = "SELECT * FROM tb_customer WHERE IdCustomer = '".$_GET["customer"]."'";
$sql_select_run = mysqli_query($connect, $sql_select);
$data_customer = mysqli_fetch_array($sql_select_run);
$Telepon = $data_customer['Telepon'];


// $jalankan1 = mysqli_query($connect, $sql);
// $jalankan2 = mysqli_query($connect, $sql2);
if($sql_select_run)  
{ 

		// send wa
								$substr_telepon = substr($Telepon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Halo, '.$data_customer['Nama'].' !
Kamu belum mengupload foto kode voucher atau kartu identitas untuk memasuki proses validasi.
Silakan upload segera di website bit.ly/LesehanEnduro2018. Kamu masih memiliki waktu 30 menit. Bila tidak upload segera maka kesempatan mendapatkan hadiah akan hangus.
Terima kasih.', // Message, // Message
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


	echo 'Berhasil kirim pesan ke nomor tujuan '.$Telepon.' ';  

}  
?>