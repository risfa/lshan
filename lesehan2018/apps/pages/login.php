<?php 
	if(isset($_POST['login'])){

	 	$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
	 	$username = $_POST['username'];
	 	$password = md5($_POST['password']);  
		$sqlcek_data = mysqli_query($connect,"SELECT Username,IdLokasi,IdPj,Jabatan FROM tb_spg WHERE Username = '$username' AND Password = '$password'");
		$data_login = mysqli_fetch_array($sqlcek_data);
		if(mysqli_num_rows($sqlcek_data)>0){
			$_SESSION['username'] = $data_login['Username'];
			$_SESSION['id_lokasi'] = $data_login['IdLokasi'];
			$_SESSION['id_spg'] = $data_login['IdPj'];
			$_SESSION['jabatan'] = $data_login['Jabatan'];

			echo "<script>document.location.href='index.php?menu=home'</script>";
		}else{
			echo '<script>
		
			swal({
				title: "Kombinasi password dan username tidak ditemukan, Hubungi CS!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=home";
				});
		
		</script>';
			/*echo "<script>alert('Kombinasi password dan username tidak ditemukan, Hubungi CS')</script>";
			echo "<script>document.location.href='index.php?menu=home'</script>";
			setTimeout(function(){
			document.location.href="index.php?menu=home";
		},2000);*/
		}
	}
 ?>
<form action="" method="post">	
	<div class="col-xs-12" id="form-awal">
		<center>
		<div class="form-group" style="margin-top: 25vh">
		<img src="http://joker.5dapps.com/pertamina/lesehan2018/assets/berkahenduro_2.png" style="height: 40vw">
			<input placeholder="Username" type="text" required="" name="username" class="form-control self-form" id="username" style="width: 70%; text-align: center;">
		</div>
		<div class="form-group">
			<input placeholder="Password" type="password" required="" name="password" class="form-control self-form" id="password" style="width: 70%; text-align: center;">
		</div>
		<div class="form-group">
			<input type="submit" class="btn self-green-button" value="LOGIN" name="login" style="width: 70%;">

		</div>
		</center>
	</div>
</form>
