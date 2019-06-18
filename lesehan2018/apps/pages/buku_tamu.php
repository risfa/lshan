<script>
  var currentDate = new Date(),
      day = currentDate.getDate(),
      month = currentDate.getMonth() + 1,
      year = currentDate.getFullYear();
  document.write(day + "/" + month + "/" + year)
</script>
<head><script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
       day = today.getDate(),
      month = today.getMonth() + 1,
      year = today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    h + ":" + m + ":" + s + "<br>" + day+"-"+month+"-"+year
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script></head>
<body onload="startTime()"></body>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><center>
		<img src="../assets/berkahenduro.png" style="width: 20vh;">
	</center></div>
	<div class="col-md-4"><a href="index.php?menu=logout" style="float:right; font-size: 20px;">LOG OUT</a></div>

</div>
<center><h3>Form Buku Tamu</h3><hr></center>
<div class="col-xs-12" id="form-awal">
	<!-- <div class="form-group">
		<label  style="font-size: 20px">Jumlah Pengunjung</label>
		<div style="float: right; color: #00b140; font-size: 15px; font-weight: bolder;" id="clock"></div>
		<input type="number" class="form-control self-form" style="width: 40%;" id="Jumlah_Pengunjung">
	</div>
	<hr> -->
	<div class="form-group">
		<label  style="font-size: 20px">Nama Lengkap</label>
		<input type="text" class="form-control self-form" style="width: 100%;" id="NamaLengkap" >
	</div>
	
	<div class="form-group">
		<label  style="font-size: 20px">Dari Mana</label>
		<br>
		<select id="DariMana" class="form-control self-form" >
			<option value="Pertamina">Pertamina</option>
			<option value="Umum">Umum</option>
			<option value="Komunitas">Komunitas</option>
			<option value="Lainnya">Lainnya</option>
		</select>
	</div>
	
	<div class="form-group">
		<label  style="font-size: 20px">Testimoni</label>
		<input type="text" class="form-control self-form" style="width: 100%;" id="Testimoni" >
	</div>
	
	<div class="form-group">
		<button id="lanjut_survey" class="btn self-green-button">LANJUTKAN >></button>
	</div>
	<!-- <div id="time_interval"></div> -->
</div>
<div style="height: 10vh; clear: both;"></div>

  <div id="wait" style="display:none; background: rgba(0,0,0,0.7);position:absolute;margin-top:-62vh;margin-left:27%;padding:20px; border-radius: 10px;"><center><img src='loaderr.gif' style="width: 15vh;height: 15vh;" ><br><h3>  Loading..</h3></div></center>




<script type="text/javascript">
	$(document).ready(function(){



		$('#Jumlah_Pengunjung').keypress(function (e) {
		    if (e.which == '13') {
		        $('#motor').focus();
		    }
		});

		function process(){

		  	$.post( "pages/process/buku_tamu_api.php", {NamaLengkap: $('#NamaLengkap').val(),DariMana: $('#DariMana').val(),Testimoni: $('#Testimoni').val()}, function( data ) {

			  // console.log(data.result); // John

			  if (data.result =='succes') {
			  	$("#wait").css("display", "none");
			swal({
				title: "berhasil masukin data!",
				type: "success" 
				}, function(){
				document.location.href="index.php?menu=buku_tamu";
				});
			  	// alert('berhasil masukin data')

			  	$('#NamaLengkap').val('');
			  	$('#DariMana').val('');
			  	$('#Testimoni').val('');
			  	$('#lainnya').val('');
			  }else{
				document.location.href="index.php?menu=buku_tamu";
			  }


			}, "json");
		}


		$('#lanjut_survey').click(function(){
			$("#wait").css("display", "block");
			if ($('#Jumlah_Pengunjung').val() == '' || $('#motor').val() == ''|| $('#mobil').val() == ''|| $('#lainnya').val() == '' ) {
				$("#wait").css("display", "none");
				swal({
				title: "Harap Melengkapi kolom Yang tersedia!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=buku_tamu";
				});
				// alert('Harap Melengkapi kolom Yang tersedia');
			}else{

			process();
			}

		});

	});
</script>