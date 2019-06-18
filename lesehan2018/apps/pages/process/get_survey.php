<?php


 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "SELECT * FROM `tb_survey` order by RAND() LIMIT 3  ";  




 if($query = mysqli_query($connect, $sql))  
 {  

 	$array_pertanyaan = array();

 	while ($data = mysqli_fetch_array($query)) {
 		
 		$new_array = array(
 			'PertanyaanSurvey' => $data['PertanyaanSurvey'],
 			'IdSurvey' => $data['IdSurvey'],
 			'Urutan' => $data['urutan']
 		);

 		$array_pertanyaan[] = $new_array;
 			// array_push($array_pertanyaan,$data['PertanyaanSurvey']);
 	}

 	echo json_encode($array_pertanyaan);
 }  




?>