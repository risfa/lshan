<?php   
	$token = $_GET['token'];
	$voucher = $_GET['voucher'];
	$sqlcek = mysqli_query($connect,"SELECT * FROM tb_token_voucher WHERE Token = '$token' AND NoVoucher = '$voucher'");
	if(mysqli_num_rows($sqlcek)!=1){
		// echo "SELECT * FROM tb_token_voucher WHERE Token = '$voucher' AND NoVoucher = '$voucher'";
		// echo "<script>document.location.href='index.php?menu=home'</script>";
	}else{

	}
		if(isset($_POST['insert'])){
			$IdCustomer = $_POST['IdCustomer'];
			$Nama = $_POST['Nama'];
			$Email = $_POST['Email'];
			$Telepon = $_POST['Telepon'];
			$Alamat = $_POST['Alamat'];
			$Password = md5($_POST['Password']);
		$sqlinsert = mysqli_query($connect,"INSERT INTO tb_customer(IdCustomer,Nama,Email,Telepon,Alamat,Sumber,Password)VALUES(NULL,'$Nama','$Email','$Telepon','$Alamat','online','$Password')");
		    // echo "New record has id: " . mysqli_insert_id($connect);
		}
		if($sqlinsert){

    		// mysqli_query($connect,"UPDATE `tb_token_voucher` SET `Token` = '$token_universal' WHERE `tb_token_voucher`.`NoVoucher` = $voucher;");
			// echo "<script>alert('yes')</script>";
			 echo "<script>document.location.href='index.php?menu=raffle&token=$token_universal&voucher=$voucher'</script>";
		}
	
 ?>


<body>

		<div class="container">		
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<div>
				<center>	
					<br><br><br>
			<h1>DAFTAR</h1>	
			<!-- <button>KLIK DISINI JIKA ANDA SUDAH MEMILIKI AKUN</button> -->
			<div class="formnya" style="width: 50%;">
			<form style="text-align: center;" method="post">
			<center>
			<input type="hidden" name="IdCustomer" value="">

			<input class="form-control" required="" type="name" name="Nama" placeholder="Masukan Nama Anda" style="">
			<br>
			<input class="form-control" required="" type="email" name="Email" placeholder="Masukan Email Anda" style="">
			<br>	
			<input class="form-control" required="" type="tel" name="Telepon" placeholder="Masukan Telepon Anda" style="">
			<br>	
			<input class="form-control" required="" type="text" name="Alamat" placeholder="Masukan Alamat Anda" style="">
			<br>	
			<input class="form-control" required="" type="password" name="Password" placeholder="Masukan Password" style="">
			<br>
			<select class="form-control" style="" required="">
				<option value="Racing">Enduro Racing</option>
				<option value="Matic">Enduro Matic</option>
			</select>
			<input type="checkbox"  name="" required="">Saya telah mengisikan segalanya dengan baik dan benar
			<br>
			<input class="form-control btn-success lanjutkan" type="submit" value="LANJUTKAN KE RAFFLE HADIAH" name="insert" style="width: 70%">
				</center>
		</form>
		</div>
		</center>
		</div>
			</div>

			<div class="col-1">
			</div>
			</div>
			<div class="row">
    <div class="col-6"><img class="ketupat" src="assets/ketupat.png"> <img class="lesehan" src="assets/lesehan.png"></div>
    <div class="col-2 mesjid"></div>
    <div class="col-4">
      <div class="col-12">
        <div>
          <img class="enduro" src="assets/endurocolor.png" style="width: 65%;margin-top: 20%; float: right;">
        </div>
      </div>
    </div>
  </div>
			<div class="row">
    <div class="col-12">
      <div style="width: 100%;height: 100px; background-color:white; text-align: center">
        <h1>  sponsor</h1></div>
      </div>
    </div>
		</div>
		<br>
</body>

<style>
	.ketupat {
    width: 12vw;
    float: left;
  } 

  .lesehan {
    float: left;
    width: 12vw;
    margin-top: 4%;
}


@media all and (min-width:320px) and (max-width: 480px) {
	.berkah {
      margin-top: 40px !important;
    }

    .lesehan
    {
      float: left !important;
    width: 46% !important;
    margin-top: 6% !important;
    }

    .ketupat
    {
          width: 50% !important;
    float: left !important;
    }

    .enduro
    {
          width: 16vh !important;
    margin-top: 25% !important;
    float: right !important;
    }

    .formnya
    {
    	width: 100% !important;

    }
    .lanjutkan
    {
    	width: 75% !important;
    	font-size: 12px !important;
    }
}
</style>