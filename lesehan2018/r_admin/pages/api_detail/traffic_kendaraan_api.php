<?php 
	$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
date_default_timezone_set('Asia/Jakarta'); 

    $date = $_GET['date'];
    
    $tanggalhariini= date('Y-m-d');
     $jumlah_mobil = 0;
     $jumlah_motor = 0;
     $jumlah_lainnya = 0;
     $total_seluruh = 0 ;
            $sql_detail = mysqli_query($connect,"SELECT * FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$date%'");
            while($total = mysqli_fetch_array($sql_detail)){
                 $jumlah_mobil += $total['Mobil'];  
                    $jumlah_motor += $total['Motor'];
                    $jumlah_lainnya += $total['Lainnya'];
                    $total_seluruh += $total['Mobil'] += $total['Motor'] += $total['Lainnya'];
            }
                    $output .='<div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf" style="margin-top:-25px;">
                            <div class="stat"> <h4>MOTOR</h4> <span class="value">'.$jumlah_motor.'</span> </div>';
                            
                    $output.='<div class="stat"> <h4>MOBIL</h4> <span class="value">'.$jumlah_mobil.'</span> </div>';

                    $output.='<div class="stat"> <h4>LAINNYA</h4> <span class="value">'.$jumlah_lainnya.'</span> </div>';
                    $output.='<div class="stat"> <h4>TOTAL</h4> <span class="value">'.$total_seluruh.'</span> </div>';
                        $output.='</div>
                    </div>
                </div>';
echo ($output);
 ?>
               <!--  $sql_details = mysqli_fetch_array(mysqli_query($connect,"SELECT  SUM(Mobil) AS Mobil FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$tanggalhariini%'"));
                 $sql_details1 = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(Lainnya) AS Umum FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$tanggalhariini%'"));
                 $sql_total = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(Mobil+Motor+Lainnya) as Total FROM `tb_traffic_kendaraan` WHERE Waktu LIKE '%$tanggalhariini%'")); -->

                 <!-- $query = "SELECT SUM(Mobil+Motor+Lainnya) as Total FROM `tb_traffic_kendaraan`";  
                 $mysql = mysqli_query($connect, $query); 
                while($sql_total = mysqli_fetch_array($mysql)){
} -->