
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php 
$sqllokasi = mysqli_query($conn,"SELECT Lokasi FROM tb_lokasi WHERE IdLokasi = '$_SESSION[id_lokasi]'");
$lokasinya = mysqli_fetch_array($sqllokasi);
 ?>
 <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><center>
		<img src="../assets/berkahenduro.png" style="width: 20vh;">
	</center></div>
	<div class="col-md-4"><a href="index.php?menu=logout" style="float:right; font-size: 20px;">LOG OUT</a></div>
	

</div>
<div class="">
	<div class="row">
		<div class="col-xs-12">
			<center><h4>Hello! <?php echo $_SESSION['username']; ?></h4>
			<h5>Lokasi Posko : <?php echo $lokasinya['Lokasi']; ?></h5>
			</center>
		</div>
		<br>

				<?php
				$sqllokasi2 = mysqli_query($conn,"SELECT Id,Judul,Waktu,Message,Keterangan,Tampilkan FROM `tb_message` WHERE IdLokasi = '$_SESSION[id_lokasi]'");
				

				while ($lokasinya2 = mysqli_fetch_array($sqllokasi2)) {

					if ($lokasinya2['Keterangan'] == 'Urgent') {
				?>
						<div class="col-xs-12" style="background:red; text-align: center; padding: 10px;">
						<p style="text-align: left; padding-left: 8vw;"><b><?php echo($lokasinya2['Judul']) ?> <?php echo($lokasinya2['Waktu']) ?></b></p>
						<div class="inner_survey_result col-xs-12">
							<h4><?php echo($lokasinya2['Message']) ?></h4>
						</div>
						
					</div>
					<br>
				<?php		
					}else{
						if ($lokasinya2['Tampilkan'] == 1) {
							
						
				 ?>
		<div class="col-xs-12" style="background:#00b140; text-align: center; padding: 10px;">
			<button id="delete" data-idmessage="<?php echo($lokasinya2[Id]);?>" >X</button>
			<p style="text-align: left; padding-left: 8vw;"><b><?php echo($lokasinya2['Judul']) ?> <?php echo($lokasinya2['Waktu']) ?></b></p>
			<div class="inner_survey_result col-xs-12">
				<h4><?php echo($lokasinya2['Message']) ?></h4>
			</div>
			
		</div>
		<br>
				<?php
					}
				}
			}
				 ?>
	</div>
</div>


<button  onclick="document.getElementById('id01').style.display='block'" style=" color: #488e19;" ><i class="fa fa-bullhorn"></i><br>Report</button>

	<!-- modal -->

	<div id="id01" class="w3-modal">
	    <div class="w3-modal-content">
	      <header class="w3-container w3-teal"> 
	        <span onclick="document.getElementById('id01').style.display='none'" 
	        class="w3-button w3-display-topright">&times;</span>
	        <h2>Kirim Pesan Untuk Admin Support</h2>
	      </header>
	       <div class="w3-container">
	       	<div class="form-group">
			    <label style="color: green;">Keterangan : </label>
			    <select id="option_keterangan_report" style="color : green ; ">
			    	<option value="Penting">Penting</option>
			    	<option value="Umum">Umum</option>
			    </select>
			 </div>
			 <div class="form-group">
			    <label style="color: green;">Message :  </label>
			    <input style="color: green;" type="text" name="message" id="message_report">
			 </div>
			 <button id="send_report">Send</button>
	      </div>
	      <footer class="w3-container w3-teal">
	        <p>Berikan keterangan pada kolom tersedia</p>
	      </footer>
	    </div>
	  </div>

	<!-- end modal -->
<style type="text/css">
	.inner_survey_result{
		border-radius: 5px;
		background: #008d33;
		margin-right: 5px;
	}
</style>


<script type="text/javascript">

	var username = '<?php echo $_SESSION['username']; ?>';

	var id_lokasi = '<?php echo $_SESSION['id_lokasi']; ?>';

	$(document).ready(function(){
		$.post( "pages/process/online_flag.php",{username:username}, function( data ) {

			// alert('succes change flag');
		});
	})
	$('#delete').click(function(){
		var id = $(this).data("idmessage");
		$.post( "pages/process/delete_message.php",{id:id}, function( data ) {

			alert(data);
			location.reload();
		});
	});


	
	$('#send_report').click(function(){
		$.post( "pages/process/insert_report.php",{id_lokasi:id_lokasi,Keterangan:$('#option_keterangan_report').val(),Message:$('#message_report').val() }, function( data ) {
				if (data.flag) {
					alert(data.message);
				}
					location.reload();
		});
	});
</script>