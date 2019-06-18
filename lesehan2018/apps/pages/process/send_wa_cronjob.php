<?php
date_default_timezone_set("Asia/Bangkok");
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  



// $username = $_POST['username'];
	
$query = mysqli_query($connect,"SELECT * from tb_send_wa");
if ($query) {

while ($data = mysqli_fetch_array($query)) {
		

		if ($data['status'] == 1) {
			# code...
		  // send wa

			if ($data['posko'] == 0) {
				
								$substr_telepon = substr($data['wa'],1,15);

								// $date = date("h:i");

								// $timestamp = strtotime($date) + 60*60*2;
								// $time = date('H:i', $timestamp);


									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Assalammualaikum.. Sudahkah kamu melengkapi report data pengunjung, foto aktivitas posko, survey dll yg dibthkan? Jika belum, harap segera input, dan bagi yang sudah, terimakasih banyak.. Selamat bertugas, have a nice day..', // Message
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
			}else{
				$substr_telepon = substr($data['wa'],1,15);

					// $date = date("h:i");

					// $timestamp = strtotime($date) + 60*60*2;
					// $time = date('H:i', $timestamp);



									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Assalammualaikum.. Sudahkah kamu melengkapi report data pengunjung, foto aktivitas posko, survey dll yg dibthkan? Jika belum, harap segera input, dan bagi yang sudah, terimakasih banyak.. Selamat bertugas, have a nice day..', // Message
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

			}
		}
	}	

}else{
	echo "Error Anda offline";
}


?>