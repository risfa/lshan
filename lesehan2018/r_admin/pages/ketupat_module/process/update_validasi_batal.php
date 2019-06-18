<?php  
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
// echo "ID".$_GET["id"];
$hadiah = "SELECT tb_token_voucher.*, tb_customer.StatusHadiah FROM tb_token_voucher JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE StatusHadiah = 'PROSES_VALIDASI' OR StatusHadiah = 'MENUNGGU_VALIDASI' AND Status = '1' AND tb_token_voucher.IdCustomer = '".$_GET["customer"]."'";
$sql_hadiah = mysqli_query($connect, $hadiah);
$data_hadiah = mysqli_fetch_array($sql_hadiah);


$sql_tambah_hadiah = "UPDATE tb_hadiah SET Jumlah = (Jumlah+1) WHERE Hadiah = '$data_hadiah[Hadiahnya]'";
$tambah_hadiah = mysqli_query($connect,$sql_tambah_hadiah);

$sql = "UPDATE  tb_token_voucher set Status = 0,Hadiahnya = '', IdCustomer = 0,Kategori = '' WHERE Id = '".$_GET["id"]."'";  
$sql2 = "UPDATE  tb_customer set StatusHadiah = 'VALIDASI_GAGAL' WHERE IdCustomer = '".$_GET["customer"]."'";  

$sql_select = "SELECT * FROM tb_customer WHERE IdCustomer = '".$_GET["customer"]."'";
$sql_select_run = mysqli_query($connect, $sql_select);
$data_customer = mysqli_fetch_array($sql_select_run);
$Telepon = $data_customer['Telepon'];

$insert_validasi_gagal =  mysqli_query($connect,"INSERT INTO tb_validasi_gagal values (null, '$_GET[customer]','$data_customer[Nama]','$data_customer[Email]','$data_hadiah[Hadiahnya]','$data_hadiah[NoVoucher]',null)");

// $insert_validasi_gagal mysqli_query($connect,"INSERT INTO tb_validasi_gagal values (null, 'TESTE','TESTE','TESTE','TESTE','TESTE','TESTE',null)");

$jalankan1 = mysqli_query($connect, $sql);
$jalankan2 = mysqli_query($connect, $sql2);
if($jalankan2)  
{ 

		// send wa
								$substr_telepon = substr($Telepon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Halo, '.$data_customer['Nama'].'!
Mohon maaf, data yang kamu masukkan tidak valid. Jika kamu yakin data yang kamu masukkan adalah benar maka silakan hubungi kami di Instagram: @sahabarenduroid atau via whatsapp dengan reply chat ini. Terima kasih
', // Message, // Message
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

	echo 'Data Update';  

}  
?>