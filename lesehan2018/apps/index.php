<?php 
session_start();
include("dbconnect.php");
date_default_timezone_set('Asia/Jakarta'); 

?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="http://joker.5dapps.com/pertamina/lesehan2018/assets/berkahenduro_2.png"/>
	
	<style src="(https://data.jsdelivr.com/v1/package/npm/sweetalert2/badge)](https://www.jsdelivr.com/package/npm/sweetalert2)"></style>
	<script src="https://unpkg.com/sweetalert2@7.12.12/dist/sweetalert2.all.js"> </script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>5D SOLVE</title>
</head>
<body>

	<div class="navbar" class="col-md-12" <?php if(empty($_SESSION['id_lokasi'])){ ?> style="display: none;" <?php } ?>>
		<div class="row" style="background-color: #28272a; text-align: center;">
			<?php 
			$menunya = $_GET['menu'];
			?>

			<?php if($menunya == 'traffic'){ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu active_menu  " ><a  href="index.php?menu=traffic"><i class="fa fa-signal"></i><br>TRAFFIC</a></div>
			<?php }else{ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu  " style="padding: 2vw;"><a style=" color: #488e19;" href="index.php?menu=traffic"><i class="fa fa-signal"></i><br>TRAFFIC</a></div>
			<?php } ?>

			<?php if($menunya == 'photo'){ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu active_menu" ><a  href="index.php?menu=photo"><i class="fa fa-camera"></i><br>PHOTO</a></div>
			<?php }else{ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu" style="padding: 2vw;"><a style=" color: #488e19;" href="index.php?menu=photo"><i class="fa fa-camera"></i><br>PHOTO</a></div>
			<?php } ?>

			<?php if($menunya == 'redeem'){ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu active_menu" ><a  href="index.php?menu=redeem"><i class="fa fa-trophy"></i><br>REDEEM</a></div>
			<?php }else{ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu" style="padding: 2vw;"><a style=" color: #488e19;" href="index.php?menu=redeem"><i class="fa fa-trophy"></i><br>REDEEM</a></div>
			<?php } ?>

			<?php if($menunya == 'home'){ ?>
			<div class="col-xs-2 col-sm-2  thumbnailmenu active_menu" ><a  href="index.php?menu=home"><i class="fa fa-home"></i><br>HOME</a></div>
			<?php }else{ ?>
			<div class="col-xs-2 col-sm-2  thumbnailmenu" style="padding: 2vw;"><a style=" color: #488e19;" href="index.php?menu=home"><i class="fa fa-home"></i><br>HOME</a></div>
			<?php } ?>

			<?php if($menunya == 'survey' || $menunya == 'survey_isi'){ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu active_menu" ><a  href="index.php?menu=survey"><i class="fa fa-check-circle"></i><br>SURVEY</a></div>
			<?php }else{ ?>
			<div class="col-xs-2 col-sm-2 thumbnailmenu" style="padding: 2vw;"><a style=" color: #488e19;" href="index.php?menu=survey"><i class="fa fa-check-circle"></i><br>SURVEY</a></div>
			<?php } ?>
			

			<div class="col-xs-2 col-sm-2 thumbnailmenu" style="padding: 2vw;"><a style=" color: #488e19;" href="index.php?menu=buku_tamu"><i class="fa  fa-address-card"></i><br>Buku Tamu</a></div>

		</div>
	</div>

	<div class="container-fluid">
		<?php include ("pages/navbar.php"); ?> 

		<style type="text/css">
		.self-form{
			background: #28272a;
			padding: 5px;
			font-size: 20px;
			height: 40px;
			color: white;
		}

		.self-green-button{
			background: #00b140;
			color: white;
		}

		.self-green-button:hover{
			background: #008d33;
			color: white;
		}

		body, html{
			color: white;
			margin:0;
			padding: 0;
			height: 100%;

		}

		.fa{
			font-size: 5vw;
		}
		.thumbnailmenu > a{
			text-decoration: none;
		}
		.navbar{
			position: fixed; 
			width: 100%; 
			z-index: 99; 
			bottom: -20px; 
			background-color: #28272a; 
			padding-left: 10px; 
			padding-right: 10px; 
			font-size: 2vw;
			font-weight: 400;
		}

		.thumbnailmenu{
			text-align: center; 
			background-color:#28272a; 
			padding: 2vw;
		}

		.active_menu, .active_menu > a{
			color: white;
			background: #008d33;
		}

		body{
			color: white;
			background: #3a3840 ;
		}
	</style>
	<div style="margin-top:20px; margin-bottom: 10vh">
		<?php 

		$menu = $_GET['menu'];
		if(empty($_SESSION['id_lokasi'])){
			include("pages/login.php");
		}else{
			// $dataspbu = mysqli_fetch_array(mysqli_query())
    // echo "SPBU ".$_SESSION['id_lokasi']. 'Nama : '.$_SESSION['username'];
			switch ($_GET['menu']) {

				case 'home':
				include("pages/home.php");
				break;

				case 'survey':
				include("pages/survey.php");
				break;

				case 'photo':
				include("pages/photo.php");
				break;

				case 'traffic':
				include("pages/traffic.php");
				break;

				case 'survey_isi':
				include("pages/survey_isi.php");
				break;

				case 'redeem':
				include("pages/redeem.php");
				break;



				case 'result':
				include("pages/result.php");
				break;


				case 'quiz':
				include("pages/quiz.php");
				break;


				case 'buku_tamu':
				include("pages/buku_tamu.php");
				break;

				

				case 'logout':
				session_destroy();
				echo "<script>document.location.href='index.php?menu=login'</script>";
				break;

				default:
				echo "<script>document.location.href='index.php?menu=home'</script>";
				break;
			}
		}
		?>
	</div>  


</div>


				<!-- <button id="request">Request</button>



				<script src="pages/src/screenfull.js"></script>
				<script type="text/javascript">

			$('#request').click(function () {
				screenfull.request($('#container')[0]);
				// Does not require jQuery. Can be used like this too:
				// screenfull.request(document.getElementById('container'));
			});

					$(document).ready(function(){
						alert('test');
						$('#request').click();

						screenfull.request($('#container')[0]);
					})
				</script>

		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			$('#request').click(function () {
				screenfull.request($('#container')[0]);
				// Does not require jQuery. Can be used like this too:
				// screenfull.request(document.getElementById('container'));
			});

			$('#exit').click(function () {
				screenfull.exit();
			});

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});

			$('#request2').click(function () {
				screenfull.request();
			});

			$('#demo-img').click(function () {
				screenfull.toggle(this);
			});

			function fullscreenchange() {
				var elem = screenfull.element;

				$('#status').text('Is fullscreen: ' + screenfull.isFullscreen);

				if (elem) {
					$('#element').text('Element: ' + elem.localName + (elem.id ? '#' + elem.id : ''));
				}

				if (!screenfull.isFullscreen) {
					$('#external-iframe').remove();
					document.body.style.overflow = 'auto';
				}
			}

			screenfull.on('change', fullscreenchange);

			// Set the initial values
			fullscreenchange();
		});
		</script>
		<script>
			var _gaq=[['_setAccount','UA-25562592-1'],['_trackPageview'],['_trackPageLoadTime']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
 -->
</body>

</html>