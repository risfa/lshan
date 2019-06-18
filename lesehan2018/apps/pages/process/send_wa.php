<?php

$nomor_telepon = $_GET['nomor_telepon'];

$nama_lengkap = $_GET['nama_lengkap'];




								    // send wa
								$substr_telepon = substr($nomor_telepon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Terimakasih '.$nama_lengkap.' anda telah mengikuti survey di program ketupat enduro ', // Message
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
									print_r($result);
									echo $result;

									// end send wa


?>