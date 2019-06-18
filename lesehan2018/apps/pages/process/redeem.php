<?php

$NoVoucher = $_GET['NoVoucher'];

 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "SELECT Status,NoVoucher,Id FROM `tb_token_voucher` where NoVoucher = '$NoVoucher' AND Status = 0 ";  




 if($query = mysqli_query($connect, $sql))  
 {  

	$count = mysqli_num_rows($query);
	if($count >= 1) {

		echo "tersedia";
      }else {
      	echo "tidak tersedia";
      }

 }  




?>