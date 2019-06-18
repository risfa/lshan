<?php 
	
	

               $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
				$sql3 = "SELECT COUNT(Jumlah) AS jumlah FROM tb_traffic_orang";
				$result3 = mysqli_query($connect,$sql3);
				while($data3 = mysqli_fetch_array($result3)){
 
                   $output .='<div class="row">
                        <div class="span6" style="text-align:center;">
                            <h2>TOTAL PENGUNJUNG HARI INI</h2> <span><h3>'.$data3['jumlah'].'</h3></span></div>';
                         } 

                            
				$sql4 = "SELECT SUM(Jumlah) AS Total FROM tb_traffic_orang";
				$result4 = mysqli_query($connect,$sql4);
				while($data4 = mysqli_fetch_array($result4)){
				 
                       $output.=' <div class="span6">
                                    <h2> TOTAL PENGUNJUNG KESELURUHAN</h2> <span><h3>	' .$data4['Total'].'</h3></span></div>
                    </div>';
                     } 
                     $output .= '<div class="widget">
            <div class="widget-header"> <i class="icon-signal"></i>
                <h3> Area Chart Example</h3>
            </div>
             <center>
            </center>
            <div class="widget-content" style="height: 250px;">
                <div id="chart_div"></div>
            </div>
            <center>

        </div>';

       $output.='<script>
        google.charts.load("current", {
            "packages": ["corechart"]
        });
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ["HARI", "POSKO1", "POSKO2", "POSKO3", "POSKO4", "POSKO5", "Average"],
                ["SENIN", 165, 938, 522, 998, 450, 614.6],
                ["SELASA", 135, 1120, 599, 1268, 288, 682],
                ["RABU", 157, 1167, 587, 807, 397, 623],
                ["KAMIS", 139, 1110, 615, 968, 215, 609.4],
                ["JUMAT", 136, 691, 629, 1026, 366, 569.6]
            ]);

            var options = {
                title: "Monthly Coffee Production by Country",
                vAxis: {
                    title: "TOTAL PENGUNJUNG"
                },
                hAxis: {
                    title: "HARI"
                },
                seriesType: "bars",
                series: {
                    5: {
                        type: "line"
                    }
                }
            };

            var chart = new google.visualization.ComboChart(document.getElementById("chart_div"));
            chart.draw(data, options);
        }';
            
           

echo($output);
 ?>