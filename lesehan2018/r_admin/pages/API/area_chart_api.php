<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
    $output .='<div class="row" id = "laporan_chart_api"><div class="span6" id="header_laporan_chart" style="margin-left:15px; cursor:pointer;">
                <div class="widget widget-nopad" title="Jumlah pengunjung kumulatif dari semua posko Lesehan Enduro 2018">
                    <div class="widget-header"> <i class="icon-list-alt" title="Jumlah pengunjung kumulatif dari semua posko Lesehan Enduro 2018 "></i>
                        <h3 title="sdfsdf" style="margin-top:-20px;">Jumlah Pengunjung</h3>
                    </div>
                    <div class="widget-content">
                        <div class="widget big-stats-container">
                            <div class="widget-content">
                                <div id="big_stats" class="cf">
                                    <div class="stat">
                                        <font style="margin-top:-10px; font-size:20px;">Pengunjung Hari Ini</font><br><br> ';
$jumlah_pengunjung = 0;
$tanggalhariini= date('Y-m-d');
$sql3 = "SELECT * FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$tanggalhariini%'";
$result3 = mysqli_query($connect,$sql3);
while($data3 = mysqli_fetch_array($result3)){
$jumlah_pengunjung += $data3['Jumlah_Pengunjung'];
}
                                       $output .=' <span class="value" style="font-size:30px;">'.$jumlah_pengunjung.'</span> </div>';
$total_pengunjung = 0;
$sql4 = "SELECT * FROM  tb_traffic_kendaraan ";
$result4 = mysqli_query($connect,$sql4);
while($data4 = mysqli_fetch_array($result4)){
$total_pengunjung += $data4['Jumlah_Pengunjung'];
}
                                       $output .='<div class="stat">
                                       <font style="margin-top:-10px; font-size:20px;">Total Pengunjung</font><br><br> <span class="value" style="font-size:30px;">'.$total_pengunjung.'</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></div>

            ';

   
//  $output .= '<div class="widget">
//             <div class="widget-header"> <i class="icon-signal"></i>
//             <h3> Area Chart Example</h3>
//             </div>
//             <center>
//             </center>
//             <div class="widget-content" style="height: 250px;">
//             <div id="chart_div"></div>
//             </div>
//             <center>

//             </div>';

// $output.='<script>
//             google.charts.load("current", {
//             "packages": ["corechart"]
//             });
//             google.charts.setOnLoadCallback(drawVisualization);

//             function drawVisualization() {
//             // Some raw data (not necessarily accurate)
//             var data = google.visualization.arrayToDataTable([
//             ["HARI", "POSKO1", "POSKO2", "POSKO3", "POSKO4", "POSKO5", "Average"],
//             ["SENIN", 165, 938, 522, 998, 450, 614.6],
//             ["SELASA", 135, 1120, 599, 1268, 288, 682],
//             ["RABU", 157, 1167, 587, 807, 397, 623],
//             ["KAMIS", 139, 1110, 615, 968, 215, 609.4],
//             ["JUMAT", 136, 691, 629, 1026, 366, 569.6]
//             ]);

//             var options = {
//             title: "Monthly Coffee Production by Country",
//             vAxis: {
//                 title: "TOTAL PENGUNJUNG"
//             },
//             hAxis: {
//                 title: "HARI"
//             },
//             seriesType: "bars",
//             series: {
//                 5: {
//                     type: "line"
//                 }
//             }
//             };

//             var chart = new google.visualization.ComboChart(document.getElementById("chart_div"));
//             chart.draw(data, options);
//             }';

            $output .= "<script>
                
                $('#laporan_chart_api').click(function(){
                        location.href='http://joker.5dapps.com/pertamina/lesehan2018/r_admin/index.php?menu=laporan_traffic';
                    });
            </script>";


    echo($output);
 ?>