<?php

// session_start();
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  


$IdCustomer = $_POST['IdCustomer'];
$JenisOli = $_POST['JenisOli'];


$sql_cek_IdCustomer = "SELECT * FROM tb_token_voucher where IdCustomer = '$IdCustomer'";
$query = mysqli_query($connect,$sql_cek_IdCustomer);
$num_rows = mysqli_num_rows($query);
if ($num_rows > 0) {
	echo('sudah input');
}else{

	 $sql = "INSERT INTO tb_token_voucher(Id,Reedem,IdCustomer,IdLokasi,Kategori) VALUES(null,'Onlines','$IdCustomer','Online','$JenisOli')";  





		 if(mysqli_query($connect, $sql))  
		 {  
		 		// echo "sukses";
		 		echo json_encode(array('result' => 'succes'));
		 }else{


		 		echo json_encode(array('result' => 'error'));

		 }  


	
}


?>