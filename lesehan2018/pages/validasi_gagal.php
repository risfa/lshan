<?php 
session_start();
 ?>
<div class="code_section">
	<div class="form-group">
		<div id="oil_type">
			<h4>Data kamu tidak valid</h4>
			<p>Data yang kamu masukan tidak sesuai.Silahkan hubungi kami di IG: <a href="https://www.instagram.com/sahabatenduroid/" target="_blank">Sahabatenduroid</a></p>
			<a href="logout.php">
			<!-- <input type="submit" name="validasi" value="LOGOUT" class="btn btn-success" > -->
			<a href="index.php?menu=logout"><button class="btn btn-success">LOGOUT</button></a>
			
			</a>
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