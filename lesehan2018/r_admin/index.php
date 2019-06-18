<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="http://joker.5dapps.com/pertamina/lesehan2018/assets/berkahenduro_2.png"/>


<head>
    <meta charset="utf-8">
    <title>Lesehan Enduro 2018 | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" > -->


    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/pages/dashboard.css" rel="stylesheet">
    <!-- DATA TABEL -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <style type="text/css">
    *, .btn, input, span{
        font-family: 'Ubuntu', sans-serif;
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<!-- END DATA TABEL -->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!-- <title>ADMIN LOGIN</title> -->
</head>

<body>
    <div>
        <div class="navbar navbar-fixed-top" style="position: fixed;">
            <?php
            if(!empty($_SESSION['Id'])){
                include('index_parts/navbar.php');
            }
            ?>

        </div>
        <div class="subnavbar" style="width: 100%;position: fixed;margin-top: 105px;z-index: 1;">

            <?php
            if(!empty($_SESSION['Id'])){
                include('index_parts/subnavbar.php');
            }
            ?>
        </div>
    </div>
    <!-- /navbar -->

    <!-- /subnavbar -->
    <div class="main">
        <div class="main-inner" style="">
            <div class="container">
                <div class="row" style="margin-top: 15vh">

                   <?php
                   $menu = $_GET['menu'];
                   if(empty($_SESSION['Id']) && $_GET['menu']!= 'login'){
                    // include("pages/login.php");
                    echo "<script>document.location.href='http://joker.5dapps.com/pertamina/lesehan2018/r_admin/index.php?menu=login'</script>";
                }else{
                    switch ($_GET['menu']) {

                        //KETUPAT
                        /*case'voucher_database':
                        include('pages/ketupat_module/voucher_database.php');
                        break;

                        case'voucher_database2':
                        include('pages/ketupat_module/voucher_database2.php');
                        break;*/

                        case'voucher_database':
                        include('pages/ketupat_module/new_table.php');
                        break;

                        case'hadiah_database':
                        include('pages/ketupat_module/hadiah_database.php');
                        break;


                        case'validasi_pemenang':
                        include('pages/ketupat_module/validasi_pemenang.php');
                        break;

                        case'data_pemenang':
                        include('pages/ketupat_module/pemenang.php');
                        break;


                        //KETUPAT

                        case'login':
                        include('pages/login.php');
                        break;

                        case 'home':
                        include('pages/home.php');
                        break;

                        case 'homee':
                        include('pages/homee.php');
                        break;

                        case 'customer':
                        include('pages/tb_customer/index.php');
                        break;

                        case 'buku_tamu':
                        include('pages/tb_buku_tamu/index.php');
                        break;

                        case 'hasil_quiz':
                        include('pages/tb_hasil_quiz/index.php');
                        break;

                        case 'hasil_survey':
                        include('pages/tb_hasil_survey/index.php');
                        break;

                        case 'jawaban_quiz':
                        include('pages/tb_jawaban_quiz/index.php');
                        break;

                        case 'jawaban_survey':
                        include('pages/tb_jawaban_survey/index.php');
                        break;

                        case 'Foto':
                        include('pages/API/laporan_foto.php');
                        break;

                        case 'kategori_foto':
                        include('pages/tb_kategori_foto/index.php');
                        break;
                        break;

                        case 'details_traffic_info':
                        include('pages/details_traffic.php');
                        break;

                        case 'laporan_foto':
                        include('pages/laporan_foto.php');
                        break;

                        case 'location_database':
                        include('pages/tb_lokasi/index.php');
                        break;

                        case 'ots_personel':
                        include('pages/tb_spg/index.php');
                        break;

                        case 'quiz':
                        include('pages/tb_quiz/index.php');
                        break;

                        case 'Report':
                        include('pages/tb_report/index.php');
                        break;

                        case 'survey':
                        include('pages/tb_survey/index.php');
                        break;

                        case 'jenis_kendaraan':
                        include('pages/tb_jenis_kendaraan/index.php');
                        break;

                        case 'hadiah':
                        include('pages/tb_hadiah/index.php');
                        break;

                        case 'HasilSurvey':
                        include('pages/chart_survey.php');
                        break;

                        case 'messages':
                        include('pages/tb_message/index.php');
                        break;
                        case 'manajemen_akun':
                        include('pages/tb_admin/index.php');
                        break;

                        case 'laporan_traffic':
                        include('pages/laporan_traffic.php');
                        break;

                        case 'laporan_traffic_summary':
                        include('pages/laporan_traffic_summary.php');
                        break;


                        case 'laporan_redeem_voucher_summary':
                        include('pages/laporan_redeem_voucher_summary.php');
                        break;





                        case 'logout':
                        session_destroy();
                        echo "<script>document.location.href='http://joker.5dapps.com/pertamina/lesehan2018/r_admin/index.php?menu=login'</script>";
                        break;
                    }
                }
                ?>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->

<!-- /extra -->
    <!-- <div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2013 <a href="#">Bootstrap Responsive Admin Template</a>. </div>
    </div> -->
    <!-- /row -->
    <!-- </div> -->
    <!-- /container -->
    <!-- </div> -->
    <!-- /footer-inner -->
    <!-- </div> -->
    <!-- /footer -->
    <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="assets/js/jquery-1.7.2.min.js"></script> -->
        <script src="assets/js/excanvas.min.js"></script>
        <script src="assets/js/chart.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script language="javascript" type="text/javascript" src="assets/js/full-calendar/fullcalendar.min.js"></script>

        <script src="assets/js/base.js"></script>

        <style type="text/css">
        .btn-success{
            background: #42a2ab;
        }
        .btn-success:hover{
            background: #42a2ab;
        }
    </style>

       <!--  <script>
var $jnoc = jQuery.noConflict();
 $jnoc(document).ready(function(){
 $jnoc("a.slick").click(function () {
 $jnoc(".active").removeClass("active");
 $jnoc(this).addClass("active");
 $jnoc(".content-slick").slideUp();var content_show =
 $jnoc(this).attr("title");
 $jnoc("#"+content_show).slideDown();
  });
 });
</script> -->

</body>

</html>
