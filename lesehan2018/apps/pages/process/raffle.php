<?php


$NoVoucher = $_GET['NoVoucher'];
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "SELECT * from tb_hadiah where Status = 'aktif' AND Jumlah > 0" ;  




 if($query = mysqli_query($connect, $sql))  
 {  

 	$data = mysqli_fetch_array($query);
	 $sql1 = "UPDATE tb_hadiah set Jumlah = (Jumlah - 1) where IdHadiah = '$data[0]'  ";  

	 if($query2 = mysqli_query($connect,$sql1)){
	 	
	 	if ($query3 = mysqli_query($connect,"SELECT * FROM `tb_hadiah` where IdHadiah = '$data[0]' ")) {

	 			$data2 = mysqli_fetch_array($query3);
	 			if($data2['Hadiah'] == ""){
	 				echo "Anda Belum Beruntung";
	 			}else{
		 			echo $data2['Hadiah'];
	 			}

	 			mysqli_query($connect,"UPDATE tb_token_voucher set Hadiahnya = '$data2[2]',Status = 2 where NoVoucher = '$NoVoucher'  ");
	 	}

	 }

 }  





?>