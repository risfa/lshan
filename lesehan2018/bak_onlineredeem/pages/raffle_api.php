<?php


$NoVoucher = $_GET['NoVoucher'];
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "SELECT * from tb_hadiah where Status = 'aktif' AND Jumlah > 0 ORDER BY RAND()" ;  




 if($query = mysqli_query($connect, $sql))  
 {  

 	$data = mysqli_fetch_array($query);
	 $sql1 = "UPDATE tb_hadiah set Jumlah = (Jumlah - 1) where IdHadiah = '$data[0]'  ";  

	 if($query2 = mysqli_query($connect,$sql1)){
	 	
	 	// if ($query3 = mysqli_query($connect,"SELECT * FROM `tb_hadiah` where IdHadiah = '$data[0]' ORDER BY RAND() ")) {
	 	// Abis di random, cek dulu apakah voucher sudah di pake apa belum, kal;o belum lanjut ke raffle
	 			$cek_voucher = mysqli_query($connect,"SELECT * FROM tb_token_voucher WHERE NoVoucher = '$NoVoucher' AND Status ='aktif'");
	 			if(mysqli_num_rows($cek_voucher)<1){
	 				echo "<script>alert('Maaf voucher tersebut sudah digunakan')</script>";
	 				echo "<script>document.location.href='index.php?menu=home'</script>";
	 			}else{

		 			$data2 = mysqli_fetch_array($query2);
		 			if($data2['Hadiah'] == ""){
		 				echo "Anda Belum Beruntung";
		 			}else{
			 			echo $data2['Hadiah'];
		 			}

		 			mysqli_query($connect,"UPDATE tb_token_voucher set Hadiahnya = '$data2[2]',Status = 1 where NoVoucher = '$NoVoucher'  ");
		 		}
	 	// }

	 }

 }  





?>