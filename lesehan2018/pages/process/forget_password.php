<?

require_once("../db/db.php");

  function encryptIt( $q ) {
      $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
      $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
      return( $qEncoded );
  }

 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

if (isset($_POST['forget_password'])) {
	$email = $_POST['email'];

	$query = mysqli_query($connect,"SELECT * FROM `tb_customer` where Email = '$email' ");
	$data = mysqli_fetch_array($query);
	$telpon = $data['Telepon'];
	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0) {

		if ($query) {
			$password = $data['Password'];
			$mt_rand = mt_rand(1,10000);
			// print_r($mt_rand);
			$password_change = md5($mt_rand);

			$query_update = mysqli_query($connect,"UPDATE `tb_customer` set Password = '$password_change'  where Email = '$email' ");
			if ($query_update) {
				// print_r($mt_rand);

				// send email



						$isi_email = '<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif;">Halo '.$email.'</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif;">Password anda adalah : '.$mt_rand.'</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Informasi lebih lanjut kunjungi media sosial kami di :</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif;"><span style="font-size: 12pt;">Instagram :</span><span style="font-size: 12pt; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">@sahabatenduroid</span></span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Facebook: Sahabat Enduro ID</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Terima kasih,</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Salam</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;"><img src="https://joker.5dapps.com/pertamina/lesehan2018/images_assets/LOGO%20ENDURO_1.jpg" width="150" height="55" /></span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Sahabat Enduro</span></p>
							<p>&nbsp;</p>
							<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: "Proxima Nova"; color: #999999; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Disclaimer:</span></p>
																<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: "Proxima Nova"; color: #999999; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">LimaDigit - ARDGroup has been appointed by PT Pertamina (Persero) to jointly manage the event of SahabatEnduroID- Berkah Enduro .</span></p>
																<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: "Proxima Nova"; color: #999999; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">For more information about this event, please contact us at instagram @sahabatenduroid</span></p>
									';




								    sendmail($email,"Reset Password.",$isi_email);

								   // send wa
								$substr_telepon = substr($telpon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Reset Password Anda Berhasil , Password anda adalah : '.$mt_rand, // Message
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


				// end send email
				echo "<script> alert('kami akan mengirimkan Password ke email anda') </script>";
				echo "<script> location.href = 'https://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=home' </script>";
			}


		}
		
	}else{

				echo "<script> alert('Email yang anda masukan tidak terdaftar') </script>";
				echo "<script> location.href = 'https://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=home' </script>";
	}

	
}

?>