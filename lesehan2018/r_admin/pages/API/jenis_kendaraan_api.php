<?php

$output .= '
<div class="widget widget-nopad" id = "laporan_traffic">
<div class="widget-header"> <i class="icon-list-alt"></i>
<h3 title="Jumlah pengunjung Posko Lesehan Enduro 2018 yang dibagi atas mobil,motor dan lainnya" style="margin-top:-20px;" >Total Keseluruhan Kendaraan</h3>

</div>';



$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 

$jumlah_mobil = 0;
$jumlah_motor =0;
$jumlah_lainnya = 0;
$total_jumlah = 0 ;
/*$tanggalhariini= date('Y-m-d');*/
$sql = "SELECT * FROM `tb_traffic_kendaraan`";  
$result = mysqli_query($connect, $sql);
while($data = mysqli_fetch_array($result)){
$jumlah_mobil += $data['Mobil'];
$jumlah_motor += $data['Motor'];
$jumlah_lainnya += $data['Lainnya'];
$total_jumlah += $data['Mobil'] += $data['Motor'] += $data['Lainnya'];
}                   
  $output.=  '<div class="widget-content">
  <div class="widget big-stats-container">
  <div class="widget-content">
  <div id="big_stats" class="cf" name="Mobil">
  
  
<div class="stat"><i style="font-size:18px;" class="fas fa-motorcycle"><font style="font-family: Ubuntu, sans-serif;">&nbsp;Motor</font></i> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$jumlah_motor.'</span> </div>

 <div class="stat"><i style="font-size:18px;" class="fas fa-car"><font style="font-family: Ubuntu, sans-serif;">&nbsp;Mobil</font></i> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$jumlah_mobil.'</span> </div>


<div class="stat"><i style="font-size:18px;" class="fas fa-certificate"><font style="font-family: Ubuntu, sans-serif;">&nbsp;Other</font></i> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$jumlah_lainnya.'</span> </div>

 <div class="stat"><i style="font-size:18px;" class="fas fa-plus"><font style="font-family: Ubuntu, sans-serif;">&nbsp;Total</font></i> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$total_jumlah.'</span> </div>';


$output.= '</div>

</div>
<!-- /widget-content -->

</div>

</div>

</div>';

$output .= "<script>
				
				$('#laporan_traffic').click(function(){
						location.href='http://joker.5dapps.com/pertamina/lesehan2018/r_admin/index.php?menu=laporan_traffic_summary';
					});
			</script>";

echo($output);
?>
<!-- $query = "SELECT * FROM `tb_traffic_kendaraan`";  
$mysql = mysqli_query($connect, $query); 
while($total_seluruh = mysqli_fetch_array($mysql)){
} -->