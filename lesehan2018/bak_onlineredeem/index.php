<!doctype html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
  
<style>
    *{
    font-family: 'Gugi', cursive;
}
</style>

<?php 
    session_start();
	$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018")  or die("Cant Connect to Server");
	$tanggal = date('dmyhis');
	$rand = rand(0,99999);
	$token_universal = md5($tanggal.$rand);

	if(isset($_POST['login'])){
		$username = trim($_POST['username']);
		$password = md5($_POST['password']);
		$login = mysqli_query($connect, "SELECT * FROM tb_spg WHERE Username = '$username' AND Password = '$password'");

		$datapegawai = mysqli_fetch_array($login);
		if(mysqli_num_rows($login)<1){
			echo "<script>alert('kombinasi Username dan Password tidak ditemukan')</script>";
		}else{
			$_SESSION['username'] = $username;
            $_SESSION['idLokasi'] = $datapegawai['IdLokasi'];
			$_SESSION['nama'] = $datapegawai['Nama'];
			echo "<script>document.location.href='index.php?menu=home'</script>";
		}
	}
 ?>
<div class="loginSPG" style="display: none;">
	<?php 
        if($_SESSION['username']){
            echo "Hallo,".$_SESSION['username']." <a href='index.php?menu=logout'>LOGOUT</a>";
        }else{
            echo "<span onclick='show_login()'>SPG</span>";
        }
     ?>
</div>
<!-- <div class="loginform" id="loginform">
	<form method="post" style="float: left;">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="password">
		<input type="submit" name="logon" value="LOGIN">
    </form>
		<button onclick="hide_form()" style="float: left;">X</button>
</div> -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#3a3840">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <title>LESEHAN ENDURO</title>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- <button id="allow_button" onclick="getLocation()" style="display: none">Try It</button> -->

    <style>
        * {
            font-family: 'Source Sans Pro', sans-serif;
        }
    </style>

    <?php 
    switch ($_GET['menu']) {
        case 'home':
            include('pages/home.php');
            break;
        case 'daftar':
            include('pages/daftar.php');
            break;
        case 'raffle':
            include('pages/raffle.php');
            break;
        case 'logout':
            session_destroy();
			echo "<script>document.location.href='index.php?menu=home'</script>";
            break;

        default:
            echo "<script>document.location.href='index.php?menu=home'</script>";
        break;

    }
 ?>



</body>

<style>
    *{
    font-family: 'Gugi', cursive;
}

    body {
        background-image: url("assets/BG.png");
        background-size: 100%;
    }
    .loginSPG{
    	background: white;
    	padding: 6px;
    	font-size: 15pt;
    	border-radius: 0px 0px 5px 0px;
    	position: absolute;
    	width: auto;
    	margin: 0;
    	top: 0;
    	z-index: 999999;
    }

    .loginform{ 
        background: white;
        padding: 2px;
        margin-top: 4vw;
        z-index: 999999;
    	position: absolute;
    }
</style>
<script type="text/javascript">
    // $(document).ready(function(){
        // document.getElementById("loginform").style.display  = "none";
    // });

    function show_login(){
        document.getElementById("loginform").style.display  = "block";
    }

    function hide_form(){
        document.getElementById("loginform").style.display  = "none";
    }
</script>

</html>