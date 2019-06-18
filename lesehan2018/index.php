<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<style src="(https://data.jsdelivr.com/v1/package/npm/sweetalert2/badge)](https://www.jsdelivr.com/package/npm/sweetalert2)"></style>
	<script src="https://unpkg.com/sweetalert2@7.12.12/dist/sweetalert2.all.js"> </script>
	<link rel="shortcut icon" type="image/png" href="http://joker.5dapps.com/pertamina/lesehan2018/assets/berkahenduro_2.png"/>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
	<title>Berkah Enduro</title>
	<meta name="theme-color" content="#5d980c" />
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">

</head>
<body>

	<style>
	*
	{
		font-family: 'Amaranth', sans-serif;
	}
</style>


<div class="container">
	<div class="row">
		<?php 
		$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 

		if($_SESSION['IdCustomer']){
			// echo "SELECT tb_token_voucher.*, tb_customer.Nama,tb_customer.StatusHadiah, tb_customer.Telepon, tb_customer.Alamat FROM tb_token_voucher JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE tb_token_voucher.IdCustomer = '$_SESSION[IdCustomer]'";
			$sql_customer = mysqli_query($connect,"SELECT tb_token_voucher.*, tb_customer.Nama,tb_customer.StatusHadiah, tb_customer.Telepon, tb_customer.Alamat FROM tb_token_voucher JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE tb_token_voucher.IdCustomer = '$_SESSION[IdCustomer]'");
			$status_customer = mysqli_fetch_array($sql_customer);


			$sql_hadiah = mysqli_query($connect,"SELECT * FROM tb_customer WHERE IdCustomer = '$_SESSION[IdCustomer]'");
			$status_hadiah = mysqli_fetch_array($sql_hadiah);

			if($status_hadiah['StatusHadiah'] == ''){
				if($_GET['menu']!='code_redeem'){
					echo "<script>document.location.href='index.php?menu=code_redeem'</script>";
				}
				
			}else if($status_hadiah['StatusHadiah'] == 'MENUNGGU_VALIDASI'){
				if($_GET['menu']!='result'){
					echo "<script>document.location.href='index.php?menu=result&NoVoucher=$status_customer[NoVoucher]&IdTransaksi=$status_customer[0]'</script>";
					
				}else{
					if(($_GET['NoVoucher'] != $status_customer['NoVoucher']) || ($_GET['IdTransaksi'] != $status_customer['NoVoucher'])){
						echo "<script>document.location.href='index.php?menu=result&NoVoucher=$status_customer[NoVoucher]&IdTransaksi=$status_customer[0]'</script>";
					}
				}
			}else if($status_hadiah['StatusHadiah'] == 'BERHASIL'){
				if($_GET['menu']!='result_berhasil'){
					echo "<script>document.location.href='index.php?menu=result_berhasil'</script>";
				}
			}else if($status_hadiah['StatusHadiah'] == 'RAFFLE'){
				if($_GET['menu']!='raffle' || $_GET['voucher']==''){
					echo "<script>document.location.href='index.php?menu=raffle&voucher=$status_customer[NoVoucher]'</script>";
				}else{
					if($_GET['voucher']!=$status_customer['NoVoucher']){
						echo "<script>document.location.href='index.php?menu=raffle&voucher=$status_customer[NoVoucher]'</script>";
					}
				}
			}else if($status_hadiah['StatusHadiah'] == 'VALIDASI_GAGAL'){
				if($_GET['menu']!='validasi_gagal'){
					echo "<script>document.location.href='index.php?menu=validasi_gagal'</script>";

				}
			}else if($status_hadiah['StatusHadiah'] == 'GAGAL'){
				if($_GET['menu']!='result_gagal'){
					echo "<script>document.location.href='index.php?menu=result_gagal'</script>";
				}
			}else if($status_hadiah['StatusHadiah'] == 'PROSES_VALIDASI'){
				if($_GET['menu']!='validasi_proses'){
					echo "<script>document.location.href='index.php?menu=validasi_proses'</script>";
				}
			}else{
				echo "<script>document.location.href='index.php?menu=result_gagal'</script>";
			}

		}

		// echo "STATUS CUST".$status_hadiah['StatusHadiah']. "SELECT tb_token_voucher.*, tb_customer.Nama, tb_customer.Telepon, tb_customer.Alamat FROM tb_token_voucher JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE tb_token_voucher.IdCustomer = '$_SESSION[IdCustomer]'";


		include('index_parts/header.php');
		switch ($_GET['menu']) {
			case 'home': 
			include 'pages/home.php';
			break;
			case 'code_redeem': 
			include 'pages/code_redeem.php';
			break;
			case 'raffle': 
			include 'pages/raffle.php';
			break;
			case 'result': 
			include 'pages/result.php';
			break;
			case 'result_gagal': 
			include 'pages/result_gagal.php';
			break;
			case 'result_berhasil': 
			include 'pages/result_berhasil.php';
			break;
			case 'validasi_gagal': 
			include 'pages/validasi_gagal.php';
			break;
			case 'validasi_proses': 
			include 'pages/validasi_proses.php';
			break;


			case 'forget_password': 
			include 'pages/forget_password.php';
			break;

			case 'logout': 
			session_destroy();
			session_unset();
			echo "<script>document.location.href='index.php'</script>";
			break;
			
			default:
			echo "<script>document.location.href='index.php?menu=home'</script>";
			break;
		}
		include('index_parts/footer.php');

		?>
	</div>
</div>

</body>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

<style type="text/css">
body{
	background: url('assets/BG.png');
	background-attachment: fixed;
}
</style>
<style>
.control {
	display: block;
	font-weight: normal;
	position: relative;
	padding-left: 30px;
	margin-bottom: 5px;
	padding-top: 3px;
	cursor: pointer;
	font-size: 16px;
}
.control input {
	position: absolute;
	z-index: -1;
	opacity: 0;
}
.control_indicator {
	position: absolute;
	top: 2px;
	left: 0;
	height: 20px;
	width: 20px;
	background: #e6e6e6;
	border: 0px solid #000000;
}
.control-radio .control_indicator {
	border-radius: undefined%;
} 

.control:hover input ~ .control_indicator,
.control input:focus ~ .control_indicator {
	background: #cccccc;
}

.control input:checked ~ .control_indicator {
	background: #74c900;
}
.control:hover input:not([disabled]):checked ~ .control_indicator,
.control input:checked:focus ~ .control_indicator {
	background: #0e6647d;
}
.control input:disabled ~ .control_indicator {
	background: #e6e6e6;
	opacity: 0.6;
	pointer-events: none;
}
.control_indicator:after {
	box-sizing: unset;
	content: '';
	position: absolute;
	display: none;
}
.control input:checked ~ .control_indicator:after {
	display: block;
}
.control-checkbox .control_indicator:after {
	left: 8px;
	top: 4px;
	width: 3px;
	height: 8px;
	border: solid #ffffff;
	border-width: 0 2px 2px 0;
	transform: rotate(45deg);
}
.control-checkbox input:disabled ~ .control_indicator:after {
	border-color: #7b7b7b;
}
</style>