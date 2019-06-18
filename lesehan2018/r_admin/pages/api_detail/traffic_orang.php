<?php  
	$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
date_default_timezone_set('Asia/Jakarta'); 
  $date = $_GET['date'];
    
  $tanggalsekarang = date('Y-m-d');
  $jumlah_pengunjung = 0;
	$sql_orang = mysqli_query($connect,"SELECT * FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$date%'");
  while($orang = mysqli_fetch_array($sql_orang)){
 $jumlah_pengunjung += $orang['Jumlah_Pengunjung'];
  }
  

$output.='<div class="widget-content">

                   <div class="widget big-stats-container"  style="margin-top:-40px;">
                      <div class="widget-content" style="background:none; ">
                          <div id="big_stats" class="cf">
                            <div class="stat"> <h4>PENGUNJUNG</h4> <span   class="value">'.$jumlah_pengunjung.'</span> </div>
                        </div>
                    </div>';
                
                   $output.=' </div>
            </div>
            </div>';
echo($output);
?>