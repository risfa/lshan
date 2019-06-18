<?php 
session_start();
 ?>
<!-- <a href="logout.php"><?php echo $_SESSION['Nama']; ?>Logout</a> -->
<div class="code_section">
	<div class="form-group">
		<div id="oil_type">
			<h4>Selamat Kamu Berhak Mendapatkan Hadiah</h4>
			<p>Data kamu telah divalidasi, silahkan cek Whatsap/SMS.Email kamu untuk liat cara redeem hadiah</p>
			<a href="index.php?menu=logout"><button class="btn btn-success">LOGOUT</button></a>
		</div>
		<center>
			<br>
		<p style=" font-size: 13px;">Kesulitan redeem hadiah? Hubungi kami di IG: <a href="https://www.instagram.com/sahabatenduroid/" target="_blank">Sahabatenduroid</a></p>
		</center>
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
		background: #c90000;
		border: #c90000;
		margin-top: 5px;
		width: 100%;
	}
	h4{
		color: #4d8401;
	}
</style>

<script type="text/javascript">
	function validasi(){
		document.getElementById("oil_code").style.display='block';

	}
	fucntion finish(){
		alert('VALIDASIKAN APAKAH VOUCHER SUDAH DIGUNAKAN? KALO SUDAH BERARTI ERROR, KALO BELOM RAFFLE LANGSUNG');
	}
</script>