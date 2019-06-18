<?php


$qst_id=$_POST['qst_id'];

 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

 $sql = "SELECT * FROM `quiz_qst` where qst_id = '$qst_id' ";  



 if($query = mysqli_query($connect, $sql))  
 {  

 			$data = mysqli_fetch_array($query);
 			echo $data['Jawaban'];


 }  



?>
