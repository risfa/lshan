<?php

 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  



// $username = $_POST['username'];
	
$query = mysqli_query($connect,"UPDATE tb_spg set flag = 0 ");
if ($query) {
	echo "Berhasil Rubah Flag";
}else{
	echo "Error Anda offline";
}


?>