<?php 
    $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
date_default_timezone_set('Asia/Jakarta'); 
    $date = $_GET['date'];
    
    $tanggalhariini= date('Y-m-d'); 

    $lokasi = "SELECT * FROM tb_lokasi";
    $lok= mysqli_query($connect,$lokasi);
    while($loop = mysqli_fetch_array($lok)){
            $jumlah_mobil = 0;
            $jumlah_motor = 0;
            $jumlah_lainnya = 0;
            $jumlah_pengunjung = 0;
            $total_seluruh = 0 ;
        $output.='<div class="col-md-6"><div class="widget widget-table action-table">
                    <h3 style="text-transform:UPPERCASE;">'.$loop['Lokasi'].'</h3>';
                   $output.='<div class="widget-content">
                        <table class="table table-striped table-bordered" style="margin-top:-25px;">
                            <thead >
                                <tr style="font-weight:bold;">
                                    <th> MOBIL </th>
                                    <th> MOTOR</th>
                                    <th> LAINNYA </th>
                                    <th> ORANG </th>
                                </tr>
                            </thead>
                            <tbody>
                            <br>';
            $jumlah =mysqli_query($connect,"SELECT * FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$date%' AND IdLokasi = $loop[0] ");
            // echo "SELECT * FROM tb_traffic_kendaraan WHERE Waktu LIKE '%$tanggalhariini%' AND IdLokasi = $loop[0]";
                while($loop1 =  mysqli_fetch_array($jumlah)){
                    $jumlah_mobil += $loop1['Mobil'];  
                    $jumlah_motor += $loop1['Motor'];
                    $jumlah_lainnya += $loop1['Lainnya'];
                    $jumlah_pengunjung += $loop1['Jumlah_Pengunjung'];
                    $total_seluruh += $loop1['Mobil'] += $loop1['Motor'] += $loop1['Lainnya'] += $loop1['Jumlah_Pengunjung'];
                } 
                    $output.='<tr>
                                    <td>' .$jumlah_mobil.'</td>
                                    <td>' .$jumlah_motor.'</td>
                                    <td>' .$jumlah_lainnya.'</td>
                                    <td>'.$jumlah_pengunjung.'</td>
                                </tr>';
                    
              
                     $output.=' </tbody>
                        </table>
                        <center>
                            <table class="table table-striped table-bordered" style="text-align: center;">
                                <center>
                                    <thead>
                                        <th>TOTAL</th>
                                    </thead>
                                    <tbody>
                                    <td>' .$total_seluruh. '</td>
                                   </tbody>
                                </center>
                            </table>
                        </center>
                    </div>
                    <!-- /widget-content -->';

  

                $output.='</div> </div>
                </div>
        </div>
    </div>';
    }
        
echo($output);
 ?>
                    <!-- $sql_total =mysqli_query($connect,"SELECT SUM(Mobil+Motor+Lainnya+Jumlah_Pengunjung) as Total FROM `tb_traffic_kendaraan` WHERE Waktu LIKE '%$tanggalhariini%' AND IdLokasi = $loop[0] ");
                    while($Total = mysqli_fetch_array($sql_total)){
                        $total_seluruh = $Total['Mobil'] + $Total['Motor'] + $Total['Lainnya'] + $Total['Jumlah_Pengunjung'];
                    } -->