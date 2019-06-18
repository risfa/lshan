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
<center><h3>Customer Survey</h3><hr></center>
<div class="col-xs-12" id="form-awal">
	<div class="form-group">
		<label  style="font-size: 20px">Nama Lengkap</label>
		<input type="text" required="" class="form-control self-form" id="nama_lengkap">
	</div>
	<div class="form-group">
		<label  style="font-size: 20px">Nomor Telepon</label>
		<input type="number" required="" class="form-control self-form" id="nomor_telepon">
	</div>
	<div class="form-group">
		<button id="lanjutkan" class="btn self-green-button">LANJUTKAN >></button>
	</div>
</div>

<div class="col-xs-12" id="form-quiz" >
	<center>
		<!-- soal -->
		<div class="soalnya">
		</div>
		<div class="segmented-control">

			<div class="segmented-control__option">
				<input class="segmented-control__input visually-hidden" type="radio" value="1" name="option" id="option-1">
				<label class="segmented-control__label" for="option-1">Laugh</label>
			</div>
			<br>
			<br>
			<div class="segmented-control__option">
				<input class="segmented-control__input visually-hidden" type="radio" value="2" name="option" id="option-2" >
				<label class="segmented-control__label" for="option-2">Cry</label>
			</div>
			<br>
			<br>
			<div class="segmented-control__option">
				<input class="segmented-control__input visually-hidden" type="radio" value="2" name="option" id="option-3" >
				<label class="segmented-control__label" for="option-3">Become an accountant</label>
			</div>
			<br>
			<br>
			<div class="segmented-control__option">
				<input class="segmented-control__input visually-hidden" type="radio" value="2" name="option" id="option-4" >
				<label class="segmented-control__label" for="option-4">Build more inclusive assets</label>
			</div>
			<br><br>
			<button class="btn self-green-button" onclick="alert('Lanjut Soal Berikutnya')" style="width: 80vw;">LANJUTKAN</button>
			<button class="btn self-green-button" onclick="lanjut_selesai()" style="width: 80vw;">SELESAI</button>
		</div>
	</center>
</div>

<div class="col-xs-12" id="form-raffle">
</div>

<div class="col-xs-12" id="form-result">
	<center>
		<i class="fa fa-check-circle" style="font-size: 20vw; color:#00b140; margin-top: 20vh;"></i>
		<h3>Terimakasih, Atas jawaban anda! </h3>
	</center>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		document.getElementById("form-awal").style.display  = "block";
		document.getElementById("form-result").style.display  = "none";
		document.getElementById("form-quiz").style.display  = "none";
		document.getElementById("form-raffle").style.display  = "none";
	});

	function lanjut_survey(){
		document.getElementById("form-quiz").style.display  = "block";
		document.getElementById("form-awal").style.display  = "none";
	}

	function lanjut_raffle(){
		document.getElementById("form-quiz").style.display  = "block";
		document.getElementById("form-awal").style.display  = "none";
	}

	function lanjut_selesai(){
		document.getElementById("form-quiz").style.display  = "none";
		document.getElementById("form-raffle").style.display  = "none";
		document.getElementById("form-result").style.display  = "block";
	}
</script>


<script type="text/javascript">

function process(){
	        $.ajax({url: "pages/process/api.php", data:{nama_lengkap:$('#nama_lengkap').val(), nomor_telepon:$('#nomor_telepon').val()}, success: function(result){
            console.log(result)
	       location.href = 'https://joker.5dapps.com/pertamina/lesehan2018/apps/index.php?menu=survey_isi&id_customer='+result+' ';
	        }});


}

function sendWa(){
	        $.ajax({url: "pages/process/send_wa.php", data:{nama_lengkap:$('#nama_lengkap').val(),nomor_telepon:$('#nomor_telepon').val()}, success: function(result){
            	console.log(result);
	        }});

}

$(document).ready(function(){

    $("#lanjutkan").click(function(){
    						sendWa();
    						process();
	       	    });

//     $('#testimoni').keypress(function (e) {
//     if (e.which == '13') {

//     }
// });



$('#nomor_telepon').keypress(function (e) {
    if (e.which == '13') {
    	
    	sendWa();
        process();
    }
});


$('#nama_lengkap').keypress(function (e) {
    if (e.which == '13') {

    	$('#nomor_telepon').focus();
    }
});




	// function get_soal(){
		
	// 	 $.ajax({url: "pages/process/get_survey.php", success: function(result){
	// 	 	var i = 0
	// 	 	var result = JSON.parse(result);
	// 				$.each(result, function(x,y){
	// 					console.log(result[0].Urutan)

	// 					if (i == 0) {

	// 					}
 //            					$('.soalnya').html(y.PertanyaanSurvey);
	// 				});          

	//         }});

	// }




});
</script>

<style type="text/css">
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