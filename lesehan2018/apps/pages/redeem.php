<?php
session_start();
// session_unset();
// echo $_SESSION['id_customer'];
?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><center>
		<img src="../assets/berkahenduro.png" style="width: 20vh;">
	</center></div>
	<div class="col-md-4"><a href="index.php?menu=logout" style="float:right; font-size: 20px;">LOG OUT</a></div>
	

</div>
<center><h3>Redeem Voucher</h3><hr></center>
<style src="(https://data.jsdelivr.com/v1/package/npm/sweetalert2/badge)](https://www.jsdelivr.com/package/npm/sweetalert2)"></style>
	<script src="https://unpkg.com/sweetalert2@7.12.12/dist/sweetalert2.all.js"> </script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<div class="col-xs-12" id="form-voucher">
	<div class="form-group">
		<label  style="font-size: 20px">Masukan Kode Voucher Anda</label>
		<input type="number" required="" class="form-control self-form" id="kode_vocher">
	</div>

		<div class="form-group">
		<label  style="font-size: 20px">Foto Kode Voucher Anda</label>
		<input type="file" required="" class="form-control self-form" id="multiple_files" name="multiple_files" multiple>
	</div>
	<div class="form-group">
		<button id="lanjutkan" class="btn self-green-button">LANJUTKAN >></button>
	</div>


	<div id="wait" style=" display: none; background: rgba(0,0,0,0.7);position:absolute;margin-top:3vh;margin-left:24%;padding:20px; border-radius: 10px;"><center><img src='loaderr.gif' style="width: 15vh;height: 15vh;" ><br></div></center>

</div>
<div class="col-xs-12" id="form-datadiri">
	<div class="form-group">
		<label  style="font-size: 20px">Nama Lengkap</label>
		<input type="text" required="" class="form-control self-form" id="nama_lengkap">
	</div>
	<div class="form-group">
		<label  style="font-size: 20px">Nomor Telepon</label>
		<input type="number" required="" class="form-control self-form" id="nomor_telepon">
	</div>
	<div class="form-group">
		<label  style="font-size: 20px">Alamat</label>
		<input type="text" required="" class="form-control self-form" id="alamat">
	</div>

	<div class="form-group">
		<label  style="font-size: 20px">Kategori</label>
		<!-- <input type="text" required="" class="form-control self-form" id="kategori"> -->
		<select class="form-control" id="kategori" style="background: green; color: white;">
			<option value="Racing">Racing</option>
			<option value="Matic">Matic</option>
		</select>
	</div>

	<div class="form-group">
		<button   id="lanjut_raffle" class="btn self-green-button">LANJUTKAN >></button>
	</div>
</div>


<div class="col-xs-12" id="form-raffle" style="margin-top:30vh;">
	<center>
		<div style="display: block; height: 200px; font-size: 5.2vw; text-transform: uppercase;" id="raffleBox" class="styleBox">
			<div class="boxnya " >LOADING DATA..</div>
		</div>

		<div style="display: none; height: 200px; font-size: 5.2vw; text-transform: uppercase;" id="resultBox">
			<div id="hadiah"></div> 
		</div>

		<div style="margin-top:-100px;">
			<input class="btn btn-lg btn-merah buttonStop" type="submit" name="" id="stop" style="height: 100px; width: 100px; border-radius: 180%;" value="STOP!">

			<a href="index.php">
				<input  onclick="return confirm('Selamat Anda Dapat Hadiah!')" class="btn btn-lg btn-biru buttonGetThePrize" type="button" style="display: none;"  value="CONTINUE >>">
			</a>
		</div>

	</center>



	<script type="text/javascript">
		var words = [
		'HANDPHONE',
		'DOMPET',
		'VOUCHER BBK @ 25K',
		'PUCH PERTAMINA',
		'TRASHBIN',
		'DOMPET STNK'
		];

		var getRandomWord = function () {
			return words[Math.floor(Math.random() * words.length)];
		};
	// var hadiahnya = "<?php echo $varible_rand ?>";



	function stop(){
		$('.buttonStop').hide();
		$('#raffleBox').hide();
		$('#PrizeBox').hide();
		document.getElementById("raffleBox").style.visibility = "hidden";



		

		$('#resultBox').show();
		$('.buttonGetThePrize').show();
	}



	$(function() { // after page load
		$('.result').hide();
		setInterval(function(){
			$('.boxnya').hide(1, function(){
				$(this).html(getRandomWord()).show();
			});
		// 5 seconds
	}, 1);

	});
</script>

</div>

<div class="col-xs-12" id="form-result">
	<center>
		<i class="fa fa-check-circle" style="font-size: 20vw; color:#00b140; margin-top: 20vh;"></i>
		<h3>Terimakasih, Atas jawaban anda! </h3>
	</center>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		document.getElementById("form-voucher").style.display  = "block";
		document.getElementById("form-datadiri").style.display  = "none";
		document.getElementById("form-raffle").style.display  = "none";
		document.getElementById("form-result").style.display  = "none";
	});

	function isidatadiri(){
		document.getElementById("form-voucher").style.display  = "none";
		document.getElementById("form-datadiri").style.display  = "block";
		document.getElementById("form-raffle").style.display  = "none";
		document.getElementById("form-result").style.display  = "none";
	}


	function lanjut_raffle(){
		document.getElementById("form-raffle").style.display  = "block";
		document.getElementById("form-datadiri").style.display  = "none";
	}

	function lanjut_selesai(){
		document.getElementById("form-quiz").style.display  = "none";
		document.getElementById("form-raffle").style.display  = "none";
		document.getElementById("form-result").style.display  = "block";
	}
</script>


<script type="text/javascript">

var redeem_vocher = '';
	function process(){
		$.ajax({url: "pages/process/redeem_api.php", data:{nama_lengkap:$('#nama_lengkap').val(), alamat:$('#alamat').val(), nomor_telepon:$('#nomor_telepon').val(), kategori:$('#kategori').val(),redeem_vocher:redeem_vocher,id_spg:<?php echo $_SESSION['id_spg']?>,id_lokasi:<?php echo $_SESSION['id_lokasi']?>}, success: function(result){
			console.log(result)
			lanjut_raffle();

		}});

	}
	$(document).ready(function(){


		function redeem(){
						$.ajax({url: "pages/process/redeem.php", data:{NoVoucher:$('#kode_vocher').val()}, success: function(result){


						if (result == 'tersedia') {
								redeem_vocher = $('#kode_vocher').val();
								isidatadiri();
						}else{
							swal({
				title: "Kode Vocher Tidak Tersedia / Sudah Di Pergunakan!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=redeem";
				});
							// alert('Kode Vocher Tidak Tersedia / Sudah Di Pergunakan')

							$('#kode_vocher').val('');

							$('#kode_vocher').focus();
							
						}
				}});

		}

		$("#lanjutkan").click(function(){
				 // var inpObj = document.getElementById("multiple_files");
			    // if (!inpObj.checkValidity()) {
			    	// alert('isi foto terlebih dahulu');
			    // } else {
					redeem();
			    // } 
			


		});

		



		$('#kode_vocher').keypress(function (e) {
			if (e.which == '13') {

				// redeem();
			}
		});




		$("#lanjut_raffle").click(function(){

			  if(confirm("Apakah anda sudah memasukan data diri dengan benar ?"))
					process();
				else
				    return false;


		});




		$("#stop").click(function(){

			// , alamat:$('#alamat').val(), nomor_telepon:$('#nomor_telepon').val(), kategori:$('#kategori').val(),redeem_vocher:redeem_vocher,id_spg:<?php echo $_SESSION['id_spg']?>,id_lokasi:<?php echo $_SESSION['id_lokasi']?>
			alert('stop');

				$.ajax({url: "pages/process/raffle.php",data:{NoVoucher:$('#kode_vocher').val()}, success: function(result){
			console.log(result)
			stop();
				$('#hadiah').html(result);
		}});


		});

		// required input photo
		// document.getElementById('multiple_files').validity.valid






		// upload struk

		$('#multiple_files').change(function(){
			$("#wait").css("display", "block");
			var error_images = '';
			var form_data = new FormData();
			var files = $('#multiple_files')[0].files;
			if(files.length > 10)
			{
				error_images += 'You can not select more than 10 files';
			}
			else
			{
				for(var i=0; i<files.length; i++)
				{
					var name = document.getElementById("multiple_files").files[i].name;
					var ext = name.split('.').pop().toLowerCase();
					if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
					{
						error_images += '<p>Invalid '+i+' File</p>';
					}
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
					var f = document.getElementById("multiple_files").files[i];
					var fsize = f.size||f.fileSize;
					if(fsize > 2000000)
					{
						error_images += '<p>' + i + ' File Size is very big</p>';
					}
					else
					{
						form_data.append("file[]", document.getElementById('multiple_files').files[i]);
					}
				}
			}
			if(error_images == '')
			{
				$.ajax({
					url:"pages/process/upload_photo_voucher.php?NoVoucher="+$('#kode_vocher').val(),
					method:"POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend:function(){
	 },   
	 success:function(data)
	 {
	 	$("#wait").css("display", "none");

	 	if (data == 'sukses') {
     swal({
        title: data+"!",
        type: "success" 
        });
        
	 		 // alert(data);
	 		// redeem();

	 	}else{
	 	swal({
        title: data+"!",
        type: "error" 
        });
	     // alert(data);
	 		
	 	}

	 }
	});
			}
			else
			{
				$("#wait").css("display", "none");
				// $('#multiple_files').val('');
				// $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
				// return false;
				swal({
				title: "error masukin gambar!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=redeem";
				});
				// alert('error masukin gambar');
			}
		});  








});
</script>


<style type="text/css">
.btn-merah{
	background: #d64425;
	
}
.btn-biru{
	background: #337ab7;
	color: white;
}
.soalnya{
	width: 80vw;
	background: #008d33;
	font-size: 5vw;
	text-align: left;
	padding: 15px;
}
ol, ul {
	list-style: none;
	padding:0;
}

h2 {
	margin: 25px 10px;
	font-size: 28px;
	color: white;
}

.segmented-control {

	width: 100%;
	margin: 2em 0;
	padding: 0;
}

.segmented-control__option {
	display: inline-block;
	margin: 0;
	padding: 0;
	list-style-type: none;
}

.segmented-control__input {
	position: absolute;

}

.segmented-control__label {
	font-size: 25px;
	display: block;
	margin: 0 -4px -1px 0; /* -1px margin removes double-thickness borders between items */
	padding: 1em .25em;
	border: 1px solid #008d33;
	font: 14px/1.5 sans-serif; 
	text-align: center;  
	width:80vw;
	cursor: pointer;
	background:#444;
}

.segmented-control__label:hover {
	background: #008d33;
	color: #fff;
	font-weight:bold;
}

.segmented-control__input:checked + .segmented-control__label {
	background: #008d33;
	color: #fff;
}

.segmented-control__input:focus + .segmented-control__label {
	background: #008d33;
	color: #fff;
	font-weight:bold;
}

.visually-hidden { /*https://developer.yahoo.com/blogs/ydn/clip-hidden-content-better-accessibility-53456.html*/
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
	clip: rect(1px, 1px, 1px, 1px);
	padding:0 !important;
	border:0 !important;
	height: 1px !important;
	width: 1px !important;
	overflow: hidden;
}
body:hover .visually-hidden a, body:hover .visually-hidden input, body:hover .visually-hidden button { display: none !important; }

fieldset
{
	border:0;
}
</style>