<?php 
session_start();
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" >

<div class="subnavbar-inner" style="margin-top: 0px !important; height: 45px;">
  <div class="container" style="margin-top: -50px;">
    <ul class="mainnav" style="float: right;">
      <li style="height: 45px;  "><a href="index.php?menu=home" style="margin-top: 1px;" ><i class="icon-dashboard" style="float:left"></i><span style="float: left; margin-top:12px; margin-left:6px;">Dashboard</span> </a> </li> 
      
      
      <li class="dropdown" style="height: 45px;"><a style="padding-top: 1px;" class="active_laporan" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fas fa-chart-line" style="float:left;"></i><span style="float: left; margin-top:12px; margin-left:6px;">Laporan</span> </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?menu=laporan_traffic">Detail Pengunjung</a></li>
          <li><a href="index.php?menu=laporan_foto">Photo Kondisi Posko</a></li>
          <li><a href="index.php?menu=hasil_survey">Hasil Survey</a></li>
          <li><a href="index.php?menu=buku_tamu">Buku Tamu</a></li>
          <!-- <li><a href="index.php?menu=customer">People Report</a></li> -->
        </ul>
      </li> 
<?php 
  if($_SESSION['level']=='1'){
?>
      <li class="dropdown" style="height: 45px;"><a  class="active_ketupat" style=" padding-top: 1px;" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fas fa-sitemap" style="float: left;"> </i><span style="float: left; margin-top:12px; margin-left: 6px;">Manajemen Ketupat</span> </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?menu=voucher_database">Data Voucher</a></li>
          <li><a href="index.php?menu=hadiah">Data Hadiah</a></li>
          <li><a href="index.php?menu=validasi_pemenang">Verifikasi Pemenang</a></li>
          <li><a href="index.php?menu=data_pemenang">Laporan Penggunaan Voucher</a></li>
        </ul>
      </li>

      <li class="dropdown" style="height: 45px;" ><a class="active_data_utama" style="padding-top: 1px;" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fas fa-table" style="float:left"></i><span style="float: left; margin-top:12px; margin-left:6px;">Data Utama</span> </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?menu=kategori_foto">Kategori Foto</a></li>
          <li><a href="index.php?menu=ots_personel">Data SPG</a></li>
          <li><a href="index.php?menu=location_database">Data Lokasi</a></li>
          <li><a href="index.php?menu=messages">Pesan</a></li>
          <li><a href="index.php?menu=manajemen_akun">Manajemen Akun</a></li>
          <li><a href="index.php?menu=Report">Report Posko</a></li>
          <li><a href="index.php?menu=customer">Customer</a></li>
          
        </ul>
      </li> 
      
      <li class="dropdown" style="height: 45px;"><a class="active_survey" style=" padding-top: 1px;" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="far fa-edit" style="float:left"></i><span style="float: left; margin-top:12px; margin-left:6px;">Survey</span> </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?menu=survey">Daftar Pertanyaan</a></li>
          <li><a href="index.php?menu=hasil_survey">Hasil Survey</a></li>
          <li><a href="index.php?menu=buku_tamu">Buku Tamu</a></li>
          <!-- <li><a href="index.php?menu=quiz">Quiz Question Database</a></li> -->
        </ul>
      </li> 
<?php } ?>
      
      <li class="dropdown" style="height: 45px;     border-right: #d9d9d9 1px solid;"><a class="" style=" padding-top: 1px;" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="far fa-user" style="float:left"></i><span style="float: left; margin-top:12px; margin-left:6px;">Akun</span> </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?menu=logout">Log Out</a></li>
        </ul>
      </li>  



  </ul>
</div>
<!-- /container --> 
</div>
<!-- /subnavbar-inner -->   