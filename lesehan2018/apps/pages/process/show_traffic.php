<?php

session_start();
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

date_default_timezone_set('Asia/Jakarta');

$output = '';
$date = date('Y-m-d');
$session_idlokasi = $_SESSION['id_lokasi'];

	 $sql = "SELECT * from tb_traffic_kendaraan where Waktu like '%$date%' and IdLokasi = '$session_idlokasi'  ";
 if($query = mysqli_query($connect, $sql))  
 {  

 	$output .= '<table class="table">
 				<thead>
				  <tr>
				    <th class="tg-us36">Jumlah Pengunjung</th>
				    <th class="tg-yw4l">Mobil</th>
				    <th class="tg-yw4l">Motor</th>
				    <th class="tg-yw4l">Lainnya</th>
				    <th class="tg-yw4l">Waktu</th>
				  </tr>
				  <thead>';
 		while ($data = mysqli_fetch_array($query)) {
 			$output.= '
 					<tbody>
 					<tr>
				    <td class="tg-yw4l">'.$data['Jumlah_Pengunjung'].'</td>
				    <td class="tg-yw4l">'.$data['Mobil'].'</td>
				    <td class="tg-yw4l">'.$data['Motor'].'</td>
				    <td class="tg-yw4l">'.$data['Lainnya'].'</td>
				    <td class="tg-yw4l">'.substr($data['Waktu'], 11,19).'</td>
				  </tr>
				  <tbody>';
 		}

 		$output.= '</table>';



 }else{



 }  



echo($output);

?>