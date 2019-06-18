<?php 
session_start();
if(!$_GET['NoVoucher']){
	echo "<script>document.location.href='index.php?menu=home'</script>";
}else{
	$cekVoucher = mysqli_query($connect,"SELECT * FROM tb_token_voucher WHERE IdCustomer = '$_SESSION[IdCustomer]' AND NoVoucher = '$_GET[NoVoucher]'");
	$jumlahVoucher = mysqli_num_rows($cekVoucher);
	if($jumlahVoucher != 1){
		echo '<script>swal({
				title: "Anda Telah Melakukan Kecurangan!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=home";
				});</script>';
		/*echo "<script>alert('Anda Telah Melakukan Kecurangan #result.php')</script>";
		echo "<script>document.location.href='index.php?menu=home'</script>";*/
	}
}

if(isset($_POST['validasi'])){
	mysqli_query($connect,"UPDATE tb_customer SET StatusHadiah = 'PROSES_VALIDASI' WHERE IdCustomer = '$_SESSION[IdCustomer]'");
	echo "<script>document.location.href='index.php?menu=home'</script>";
}
 
 ?>
<div class="code_section">
		<div style="font-weight: bolder; color: #4d8401;">Hai, 
<?php echo $_SESSION['Nama']; ?><a href="logout.php"> | Logout</a><br></div>
	<div class="form-group">
		<div id="oil_type">
			<h4>Upload Berkas Untuk Validasi</h4>
			<p>Silakan untuk meng-upload berkas yang dibutuhkan guna verifikasi data diri anda</p>
			<p>1. Upload Voucher</p>
				<input  type="file" name="voucher" id="voucher123" multiple />
				<br>
			<p>2. Upload Kartu Identitas Anda</p>

				<input  type="file" name="voucher" id="kartu_identitas" multiple />
				<form method="post">
					<input id="validasi" type="submit" name="validasi" value="VALIDASI" class="btn btn-success" style="display: none;" >
				</form>
		</div>
		
	</div>
</div>


	<div id="wait" style="display:none;background: rgba(0,0,0,0.7);position:absolute;margin-top:-50vh;margin-left:33%;padding:20px; border-radius: 10px;"><center><img src='loaderr.gif' style="width: 15vh;height: 15vh;" ><br><h3>	Loading..</h3></div></center>

<style type="text/css">
	.code_section{
		width: 85%;
		padding: 10px;
		margin: 0 auto;
		background: rgba(225,225,225,0.5);
		margin-bottom: 5vh
	}
	.btn{
		background: #74c900;
		border: #74c900;
		margin-top: 5px;
		width: 100%;
	}
	h4{
		color: #4d8401;
	}
</style>

<script type="text/javascript">

	var foto_upload = 0;

	var foto_upload2 = 0;
	function next_ruffle(){
		location.href = 'http://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=raffle&voucher='+'<?php echo $_GET['NoVoucher'];?>'
	}
	function validasi(){
		document.getElementById("oil_code").style.display='block';

	}
	function finish(){
		alert('VALIDASIKAN APAKAH VOUCHER SUDAH DIGUNAKAN? KALO SUDAH BERARTI ERROR, KALO BELOM RAFFLE LANGSUNG');
	}


	var IdTransaksi = <?php echo($_GET['IdTransaksi']); ?>;



				// photo
					$('#voucher123').change(function(){
							var error_images = '';
							var form_data = new FormData();
							var files = $('#voucher123')[0].files;
							if(files.length > 10)
							{
								error_images += 'You can not select more than 10 files';
							}
							else
							{
								for(var i=0; i<files.length; i++)
								{
									var name = document.getElementById("voucher123").files[i].name;
									var ext = name.split('.').pop().toLowerCase();
									if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
									{
										error_images += '<p>Invalid '+i+' File</p>';
									}
									var oFReader = new FileReader();
									oFReader.readAsDataURL(document.getElementById("voucher123").files[i]);
									var f = document.getElementById("voucher123").files[i];
									var fsize = f.size||f.fileSize;
									if(fsize > 2000000)
									{
										error_images += '<p>' + i + ' File Size is very big</p>';
									}
									else
									{
										form_data.append("file[]", document.getElementById('voucher123').files[i]);
									}
								}
							}
							if(error_images == '')
							{
								$.ajax({
									url:"pages/process/upload_foto_voucher.php?IdTransaksi="+IdTransaksi,
									method:"POST",
									data: form_data,
									contentType: false,
									cache: false,
									processData: false,
									beforeSend:function(){
										$("#wait").css("display", "block");
				     // alert('wait')
				 },   
				 success:function(data)
				 {
				 	if (foto_upload2 == 1) {
							$("#validasi").css("display", "block");
					}
				 	foto_upload = 1; 
				 	$("#wait").css("display", "none");
				     // $('#error_voucher123').html('<br /><label class="text-success">Uploaded</label>');
				     // load_image_data();
				     swal({
				title: "Sukses Upload Voucher! ",
				type: "success" 
				}, function(){
				document.location.href="index.php?menu=home";
				});
				     // alert('sukses');
				 }
				});
							}
							else
							{
								$('#voucher123').val('');
								$('#error_voucher123').html("<span class='text-danger'>"+error_images+"</span>");
								return false;
							}
						});  

				// end

				// kartu_identitas

				$('#kartu_identitas').change(function(){
							var error_images = '';
							var form_data = new FormData();
							var files = $('#kartu_identitas')[0].files;
							if(files.length > 10)
							{
								error_images += 'You can not select more than 10 files';
							}
							else
							{
								for(var i=0; i<files.length; i++)
								{
									var name = document.getElementById("kartu_identitas").files[i].name;
									var ext = name.split('.').pop().toLowerCase();
									if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
									{
										error_images += '<p>Invalid '+i+' File</p>';
									}
									var oFReader = new FileReader();
									oFReader.readAsDataURL(document.getElementById("kartu_identitas").files[i]);
									var f = document.getElementById("kartu_identitas").files[i];
									var fsize = f.size||f.fileSize;
									if(fsize > 2000000)
									{
										error_images += '<p>' + i + ' File Size is very big</p>';
									}
									else
									{
										form_data.append("file[]", document.getElementById('kartu_identitas').files[i]);
									}
								}
							}
							if(error_images == '')
							{
								$.ajax({
									url:"pages/process/upload_foto_identitas.php?IdTransaksi="+IdTransaksi,
									method:"POST",
									data: form_data,
									contentType: false,
									cache: false,
									processData: false,
									beforeSend:function(){
										
										$("#wait").css("display", "block");
				     // alert('wait')
				 },   
				 success:function(data)
				 {
					foto_upload2 = 1;
				 	if (foto_upload == 1) {
							$("#validasi").css("display", "block");
					}
				 	$("#wait").css("display", "none");
				     // $('#error_voucher123').html('<br /><label class="text-success">Uploaded</label>');
				     // load_image_data();
				    swal({
				title: "Sukses Upload Kartu Identitas Anda! ",
				type: "success" 
				}, function(){
				document.location.href="index.php?menu=home";
				});
				      // alert('sukses');
				 }
				});
							}
							else
							{
								$('#kartu_identitas').val('');
								$('#error_voucher123').html("<span class='text-danger'>"+error_images+"</span>");
								return false;
							}
						});  

					

				// end

</script>
