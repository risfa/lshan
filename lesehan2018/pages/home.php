<?php 
session_start();
require_once("db/db.php");
?>


<br><br>
<div class="tab_section" style="width: 95%; margin: 0 auto">
	<ul class="nav nav-tabs">
		<li class="active" id="login" style="width: 50%; background: #449d44"><a data-toggle="tab" href="#home">Login</a></li>
		<li class="" id="registrasi" style="width: 50%; background: #449d44"><a data-toggle="tab" href="#menu1" >Daftar</a></li>
	</ul>

	<div class="tab-content" style="background: white; margin-top:-20px; ">
		<div id="home" class="tab-pane fade in active">
			<form method="post">
				<br>
				<h4>Form Login</h4>
				<div class="form-group">
					<input type="text" required  class="form-control" name="Email" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password" required  class="form-control" name="Password" placeholder="Password">
					<!-- <input type="submit"   class="form-control" name="forget_password" value="forget password"> -->
					<div style="width: 100%; margin-top: 2.5vh; padding-bottom:2.5vh;">
						<div class="col-xs-6">  
							<a href="index.php?menu=forget_password" style="color: #00b5ed; float: left; margin-left: -12px; text-decoration: underline;">Lupa Password?</a>
						</div>
						<div class="col-xs-6">
							<a data-toggle="tab" href="#menu1" style="color: #00b5ed; float: right; margin-right: -12px; text-decoration: underline;" onclick="switchtoregister()">Belum Daftar? Klik Disini</a>
						</div>
					</div>
					</div>
				<input type="submit" class="btn btn-success" name="login" value="LOGIN" style="width: 100%;">

			</form>
		</div>
		<?php
		$token = $_GET['token'];
		$voucher = $_GET['voucher'];


	if (isset($_POST['login'])) {


			$Email = $_POST['Email'];
			$Password = md5($_POST['Password']);



			$sql_cek2 = mysqli_query($connect, "SELECT * FROM tb_customer where Email = '$Email' AND Password = '$Password' ");
			$num_rows2 = mysqli_num_rows($sql_cek2);
			$fetch_array = mysqli_fetch_array($sql_cek2);

			if ($num_rows2 > 0) {
				$_SESSION['Nama'] = $fetch_array['Nama'];
				$_SESSION['IdCustomer'] = $fetch_array['IdCustomer'];
			echo "<script>document.location.href='index.php?menu=home'</script>";

			}else{

				echo '<script>swal({
				title: "Email atau Password yang anda masukan salah!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=home";
				});</script>';
				// echo "<script>alert('Email & Pasword yang anda masukan salah')</script>";
			}

	}
		if(isset($_POST['insert'])){

			$IdCustomer = $_POST['IdCustomer'];
			$Nama = $_POST['Nama'];
			$Telepon = $_POST['Telepon'];
			$Alamat = $_POST['Alamat'];
			$Email = $_POST['Email'];
			$Password = md5($_POST['Password']);


								// echo "<script>alert('SELECT * FROM tb_customer where Email = '$Email' ')</script>";
			$sql_cek = mysqli_query($connect, "SELECT * FROM tb_customer where Email = '$Email' OR Telepon = '$Telepon' ");
			$num_rows = mysqli_num_rows($sql_cek);
			if($num_rows > 0) {
					echo '<script>swal({
				title: "Email / Telepon anda sudah terdaftar!",
				type: "error" 
				});</script>';
					// echo "<script>alert('Email / Telepon anda sudah terdaftar')</script>";

			}else if($_POST['Password'] != $_POST['Password2']){
				echo '<script>swal({
				title: "Password Anda tidak Sesuai",
				type: "error" 
				});</script>';			
			}else{
				$sqlinsert = mysqli_query($connect,"INSERT INTO tb_customer(IdCustomer,Nama,Telepon,Alamat,Email,Password,Sumber) VALUES(NULL,'$Nama','$Telepon','$Alamat','$Email','$Password','Online')");
							if($sqlinsert){

								// send email

								$isi_email = '<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;"><img src="https://joker.5dapps.com/pertamina/lesehan2018/images_assets/registrasi.jpg" width="600" height="344" /></span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Halo &nbsp; '.$Nama.' </span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif; font-size: 12pt;"><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Terima kasih sudah mendaftarkan diri dalam kegiatan </span><em><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">doorprize</span></em><span style="color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> Ketupat Enduro. Kamu berkesempatan untuk memenangkan hadiah &nbsp;1 unit HP Samsung J5 Pro, 1 unit Xiaomi Yi Cam Action, 5 unit Bluetooth Speaker JBL Go, 5 unit Xiaomi Mi Band, 20 unit pulsa isi ulang Rp100.000, dan 30 unit Pulsa isi ulang Rp50.000.</span></span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><br /><br /></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Berangkat mudik, Sob? Jangan lupa kunjungi 5 posko mudik Lesehan Enduro. Nikmati semua fasilitas GRATIS berupa wifi, charging spot, ruang bermain anak, ruang menyusui, ruang istirahat, pijat, servis motor ringan, medis ringan, takjil, dan potong rambut. Kunjungi poskonya di :</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Masjid Al-Muhajirin, Cilegon, Masjid At Tuqo, Cirebon, Masjid Raya Al Fairus, Pekalongan, Masjid Uswatun Hasanah, Nagreg, dan SPBU PERTAMINA 44.531.28, Banyumas.</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Informasi lebih lanjut kunjungi media sosial kami di :</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-family: calibri, sans-serif;"><span style="font-size: 12pt;">Instagram :</span><span style="font-size: 12pt; color: #222222; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">@sahabatenduroid</span></span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Facebook: Sahabat Enduro ID</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Terima kasih,</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Salam</span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;"><img src="https://joker.5dapps.com/pertamina/lesehan2018/images_assets/LOGO%20ENDURO_2.jpg" width="250" height="77" /></span></p>
							<p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: calibri, sans-serif;">Sahabat Enduro</span></p>
							<p>&nbsp;</p>
							<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: calibri, sans-serif; color: #999999; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Disclaimer:</span></p>
							<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: calibri, sans-serif; color: #999999; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">LimaDigit - ARDGroup has been appointed by PT Pertamina (Persero) to jointly manage the event of SahabatEnduroID- Berkah Enduro .</span></p>
							<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 10pt; font-family: calibri, sans-serif; color: #999999; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">For more information about this event, please contact us at instagram @sahabatenduroid</span></p>';


								    sendmail($Email,"Selamat! Kamu Berkesempatan Memenangkan Hadiah dari Ketupat Enduro.",$isi_email);

								// ennd send mail

								    // send wa
								$substr_telepon = substr($Telepon,1,15);

									$data = [
									    'phone' => '62'.$substr_telepon, // Receivers phone
									    'body' => 'Halo,  '.$Nama.'!
Terima kasih sudah mendaftarkan diri dalam kegiatan doorprize Ketupat Enduro. Kamu berkesempatan untuk memenangkan hadiah  1 unit HP Samsung J5 Pro, 1 unit Xiaomi Yi Cam Action, 5 unit Bluetooth Speaker JBL Go, 5 unit Xiaomi Mi Band, 20 unit pulsa isi ulang Rp100.000, dan 30 unit Pulsa isi ulang Rp50.000.

Berangkat mudik, Sob? Jangan lupa kunjungi 5 posko mudik Lesehan Enduro. Nikmati semua fasilitas GRATIS berupa wifi, charging spot, ruang bermain anak, ruang menyusui, ruang istirahat, pijat, servis motor ringan, medis ringan, takjil, dan potong rambut. Kunjungi poskonya di :
Masjid Al-Muhajirin, Cilegon, Masjid At Tuqo, Cirebon, Masjid Raya Al Fairus, Pekalongan, Masjid Uswatun Hasanah, Nagreg, dan SPBU PERTAMINA 44.531.28, Banyumas.


Informasi lebih lanjut kunjungi Instagram kami di: @sahabatenduroid', // Message
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
																				
								// echo "<script>run(".$Telepon.")</script>";
								echo '<script>swal({
				title: "Anda Telah Berhasil Registrasi!",
				type: "success" 
				}, function(){
				document.location.href="index.php?menu=http://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=home";
				});</script>';	
								// echo "<script>alert('berhasil registrasi')</script>";
								// echo "<script>document.location.href='http://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=home'</script>";
							}
			} 
				
		}
		 ?>

		<div id="menu1" class="tab-pane fade in ">
			<form method="post">
				<input type="hidden" name="IdCustomer" value="">
				<br>
				<h4>Form Pendaftaran</h4>
				<div class="form-group">
					<input type="text" required  class="form-control" name="Nama" placeholder="Nama Sesuai Identitas">
				</div>
				<div class="form-group">
					<input type="number" required  class="form-control" name="Telepon" placeholder="No. HP Aktif, Cth:08123456789">
				</div>
				<div class="form-group">
					<input type="text" required  class="form-control" name="Alamat" placeholder="Alamat Sesuai Identitas">
				</div>
				<div class="form-group">
					<input type="email" required  class="form-control" name="Email" placeholder="Email Aktif">
				</div>
				<div class="form-group"> 
					<input type="password" required  class="form-control" name="Password" id="password1" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" required  class="form-control" name="Password2" id="password2" placeholder="Ulangi Password">
				</div>
<!-- 				<div class="form-group" style="display: none;">
					<input type="checkbox" required="" name="">&nbsp;  Dengan ini saya telah membaca <a style="color: #0051a4; text-decoration: underline; font-weight: bolder;" href="#" data-toggle="modal" data-target="#myModal">Syarat & Ketentuan berlaku</a>  serta menyetujui bahwa data yang saya masukan benar. 
				</div> -->
				    <div class="control-group">
				        <label class="control control-checkbox">
				            Dengan ini saya telah membaca <a style="color: #0051a4; text-decoration: underline; font-weight: bolder;" href="#" data-toggle="modal" data-target="#myModal">Syarat & Ketentuan berlaku</a>  serta menyetujui bahwa data yang saya masukan benar. 
				            <input type="checkbox" required=""  />
				            <div class="control_indicator" style="margin-top: 5px;"></div>
				        </label>
				        <br>
				    </div>

				<input type="submit" class="btn btn-success" name="insert" onclick="validasi_password()" value="DAFTAR" style="width: 100%;">
			</form>
		</div>
	</div>
</div>

<br><br>

<script type="text/javascript">
	function switchtoregister(){
		document.getElementById("registrasi").classList.add('active');
		document.getElementById("login").classList.remove('active');
	}
</script>


<style type="text/css">

	.nav-tabs {
		border-bottom: none !important;
	}
	.tab-pane {
		padding: 5px;
	}
	.active, .active > a{
		color: #0051a4;
	}
	a{
		color: white;
	}

</style>

