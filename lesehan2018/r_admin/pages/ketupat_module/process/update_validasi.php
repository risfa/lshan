<?php  
require_once("db/db.php");
@session_start();
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
$sql = "UPDATE  tb_token_voucher SET Status = 2 WHERE Id = '".$_GET["id"]."'";  
$sql2 = "UPDATE tb_customer SET StatusHadiah = 'BERHASIL' WHERE IdCustomer = '".$_GET["customer"]."'";
$sql_select = "SELECT * from tb_customer WHERE IdCustomer = '".$_GET["customer"]."' ";
$sql_select_hadiah = "SELECT * From tb_token_voucher WHERE Id = '".$_GET["id"]."' ";
$query = mysqli_query($connect, $sql_select);
$data = mysqli_fetch_array($query);
$query_hadiah = mysqli_query($connect, $sql_select_hadiah);
$data_hadiah = mysqli_fetch_array($query_hadiah);
$Email = $data['Email'];
$Nama = $data['Nama'];
$Hadiahnya = $data_hadiah['Hadiahnya'];
$Telepon = $data['Telepon'];

if(mysqli_query($connect, $sql))  
{  
	mysqli_query($connect, $sql2);

	// send email


						$isi_email = '
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;"><img src="https://joker.5dapps.com/pertamina/lesehan2018/images_assets/hadiah.jpg" width="600" height="344" /></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Selamat! Kamu berhasil memenangkan </span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; text-align: center;"><span style="font-family: calibri, sans-serif; font-size: 12pt;"><strong><span style="color: #222222; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">('.$Hadiahnya.')</span></strong></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif; font-size: 12pt;"><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Hadiah bisa kamu klaim di kantor EO kami bertempat di :</span><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><br /></span><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Ardency | Ardgroup</span></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Komplek Kebayoran Center Blok A17</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Jl. Raya Kebayoran Baru - Velbak</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Jakarta Selatan. Jakarta 12240</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif; font-size: 12pt;"><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Untuk mempermudah, silakan klik: </span><a style="text-decoration: none;" href="https://goo.gl/maps/7XN3zXDJLK32"><span style="color: #1155cc; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: underline; text-decoration-skip-ink: none; vertical-align: baseline; white-space: pre-wrap;">https://goo.gl/maps/7XN3zXDJLK32</span></a><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> &nbsp;</span></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif; font-size: 12pt;"><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Hadiah bisa diambil mulai </span><strong><span style="color: #222222; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Senin 23 Juli 2018 sampai Selasa 31 Juli 2018.</span></strong></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Pengambilan hadiah hanya bisa dilakukan pada jam &amp; hari kerja mulai pukul 10.00 WIB - 17.00 WIB.</span></p>
									<p><strong><span style="font-size: 10pt; font-family: "Proxima Nova"; color: #222222; background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Jika kamu memenangkan hadiah pulsa maka hadiah akan kami top up paling lambat pada 31 juli 2018</span></strong></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Informasi lebih lanjut kunjungi media sosial kami di :</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif;"><span style="font-size: 12pt;">Instagram :</span><span style="font-size: 12pt; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">@sahabatenduroid</span></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Facebook: Sahabat Enduro ID</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Terima kasih,</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Salam</span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;"><img src="https://joker.5dapps.com/pertamina/lesehan2018/images_assets/LOGO%20ENDURO_1.jpg" width="250" height="77" /></span></p>
									<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Sahabat Enduro</span></p>
									<p>&nbsp;</p>
									<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: calibri, sans-serif; color: #999999; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Disclaimer:</span></p>
									<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: calibri, sans-serif; color: #999999; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">LimaDigit - ARDGroup has been appointed by PT Pertamina (Persero) to jointly manage the event of SahabatEnduroID- Berkah Enduro .</span></p>
									<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: calibri, sans-serif; color: #999999; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">For more information about this event, please contact us at instagram @sahabatenduroid</span></p>';


								    sendmail($Email,"Selamat! Kamu Berhasil Mendapatkan Hadiah dari Ketupat Enduro.",$isi_email);

								// ennd send mail

								    	// send wa
								$substr_telepon = substr($Telepon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Halo,  '.$Nama.'!
Selamat! Kamu berhasil memenangkan 
'.$data_hadiah['Hadiah'].'
Hadiah bisa kamu klaim di kantor EO kami bertempat di :
Ardency | Ardgroup. Komplek Kebayoran Center Blok A17. Jl. Raya Kebayoran Baru - Velbak. Jakarta Selatan. 12240

Untuk mempermudah, silakan klik: https://goo.gl/maps/7XN3zXDJLK32  

Hadiah bisa diambil mulai Senin 23 Juli 2018 sampai Selasa 31 Juli 2018
Pengambilan hadiah hanya bisa dilakukan pada jam & hari kerja mulai pukul 10.00 WIB - 17.00 WIB.

Jika kamu memenangkan hadiah pulsa maka hadiah akan kami top up paling lambat pada 31 juli 2018


Informasi lebih lanjut kunjungi Instagram kami di: @sahabatenduroid
', // Message, // Message
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
echo "Sukses Update peserta sebagai pemenang";


		
}

?>
