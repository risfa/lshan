<?php 
    $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
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
                                    <th> Matic </th>
                                    <th> Racing</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <br>';
                $jumlah =mysqli_query($connect,"SELECT * FROM `tb_token_voucher` WHERE IdLokasi != '' AND IdLokasi = $loop[0] ");
                while($loop1 =  mysqli_fetch_array($jumlah)){

                    $sql_matic = mysqli_query($connect, "SELECT * FROM `tb_token_voucher` WHERE  IdLokasi = $loop[0] AND Kategori = 'Matic' " );

                    $sql_racing = mysqli_query($connect, "SELECT * FROM `tb_token_voucher` WHERE  IdLokasi = $loop[0] AND Kategori = 'Racing' " );

                    $jumlah_matic = mysqli_num_rows($sql_matic);
                    $jumlah_racing = mysqli_num_rows($sql_racing);

                    $total_seluruh = $jumlah_matic + $jumlah_racing;
                } 
                    $output.='<tr>
                                    <td>' .$jumlah_matic.'</td>
                                    <td>' .$jumlah_racing.'</td>

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
