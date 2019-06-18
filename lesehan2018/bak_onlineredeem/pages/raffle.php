
<?php 
	$token = $_GET['token'];
	$voucher = $_GET['voucher'];
	$sqlcek = mysqli_query($connect,"SELECT * FROM tb_token_voucher WHERE Status = 0 AND NoVoucher = '$voucher'");
	if(mysqli_num_rows($sqlcek)!=1){
		// echo "SELECT * FROM tb_token_voucher WHERE Token = '$voucher' AND NoVoucher = '$voucher'";
		echo "<script>document.location.href='index.php?menu=home'</script>";
	}
 ?>
<div class="container">


			<center style="margin-top: 20vh;	 ">

				<div style="display: block; height: 200px;text-transform: uppercase;" id="raffleBox" class="styleBox">
					<div class="boxnya" style="overflow: hidden; height: 150px; padding: 0px; margin: 0px; width: 100%; opacity: 1; font-size: 2.5rem;"><h1>LOADING HADIAH</h1></div>
				</div>

				<div style="display: none; height: 200px; font-size:2.5rem; text-transform: uppercase;" id="resultBox">
					<div id="hadiah"></div> 
				</div>

				<div class="stopp" style="margin-top: -80px; ">
					<input class="btn btn-lg btn-danger buttonStop" type="submit" name="" id="stop" style="height: 100px; width: 100px; border-radius: 180%;" value="STOP!">
					
					<a href="http://joker.5dapps.com/pertamina/luckyfriday/index.php">
						<input onclick="return confirm(&#39;Selamat Anda Dapat Hadiah!&#39;)" class="btn btn-lg btn-info buttonGetThePrize" type="button" style="display: none;" value="GET THE PRIZE!">
					</a>
				</div>

			</center>

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
			<div class="row" style="margin-top: 5px;">
    <div class="col-12">
      <div style="width: 100%;height: 100px; background-color:white; text-align: center">
        <h1>  sponsor</h1></div>
      </div>
    </div>
		</div>


</div>

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
    .stopp
    {
    	margin-top: -40px !important;
    }


}
</style>

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
	// var hadiahnya = "";



	function stop(){
		$('.buttonStop').hide();
		$('#raffleBox').hide();
		$('#PrizeBox').hide();
		document.getElementById("raffleBox").style.visibility = "hidden";




		$('#resultBox').show();
		$('.buttonGetThePrize').show();
	}


	
	$('#stop').click(function(){

			$.ajax({url: "pages/raffle_api.php",data:{NoVoucher:'<?php echo $_GET['voucher']; ?>'}, success: function(result){
			console.log(result)
			stop();
				$('#hadiah').html(result);
		}});



	});



	$(function() { // after page load
		$('.result').hide();
		setInterval(function(){
			$('.boxnya').hide(1, function(){
				$(this).html(getRandomWord()).show();
			});
		// 5 seconds
	}, 1);

	});
</script></div>  


</div>



</body></html>