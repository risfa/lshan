<?php 
session_start();

if (empty($_SESSION['IdCustomer'])) {
	
	echo "<script>document.location.href='index.php?menu=home'</script>";
}


?>

<div class="code_section">
	<div style="font-weight: bolder; color: #4d8401;">Hai, 
		<?php echo $_SESSION['Nama']; ?><a href="logout.php"> | Logout</a><br></div>
		<div class="form-group">
			<div id="oil_type">
				<h4>Pilih Jenis Oli Anda</h4>
				<select class="form-control" id="select_oli" required="">
					<option value="">-Pilih Disini-</option>
					<option value="Racing">Racing</option>
					<option value="Matic">Matic</option>
				</select>
				<input type="submit" name="validasi" value="LANJUTKAN" class="btn btn-success" onclick="lanjut()">
			</div>
			<div id="oil_code" style="display: none;">
				<h4>Masukan Kode Voucher Anda</h4>
				<input type="text" class="form-control" name="kode_voucher" id="kode_voucher">
				<input type="submit" name="validasi" value="VALIDASI" class="btn btn-success" onclick="finish()">
			</div>
		</div>
	</div>

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

	var jenis_oli = '';
	function validasi(){
		document.getElementById("oil_type").style.display='none';
		document.getElementById("oil_code").style.display='block';

	}
	function lanjut(){

		jenis_oli = $('#select_oli').val();
		// alert(jenis_oli);
		// var IdCustomer = "<?php echo $_SESSION['IdCustomer'] ?>";

		//   	$.post( "pages/process/jenis_oli.php", {IdCustomer : IdCustomer,JenisOli :$('#select_oli').val()}, function( data ) {

		// 	validasi();


		// 	}, "json");
		if(jenis_oli !=''){
			validasi();

		}else{
			alert('Isikan Jenis Oli Anda.');
		}



	}
	function finish(){
		// alert(jenis_oli);
		
		var IdCustomer = "<?php echo $_SESSION['IdCustomer'] ?>";

		$.post( "pages/process/insert_kode_voucher.php", {IdCustomer : IdCustomer,JenisOli :jenis_oli,kode_voucher :$('#kode_voucher').val()}, function( data ) {
			console.log(data);
				// document.location.href="index.php?menu=home";

				// alert(data.result);			
				if (data.flag) {
					window.location.href = "http://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=raffle&IdTransaksi="+data.IdTransaksi+"&NoVoucher="+data.NoVoucher;

				}else{
					swal({
						title:(data.result)+"!",
						type: "error" 
					});

				}


			}, "json");

		
		// alert('VALIDASIKAN APAKAH VOUCHER SUDAH DIGUNAKAN? KALO SUDAH BERARTI ERROR, KALO BELOM RAFFLE LANGSUNG');
	}
</script>