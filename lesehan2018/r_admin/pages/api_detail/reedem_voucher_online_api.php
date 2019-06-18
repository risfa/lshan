<?php 
    $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");

$output .= '<div class="col-md-6"><div class="widget widget-table action-table">
                    <h3 style="text-transform:UPPERCASE;">Redeem Online </h3><div class="widget-content">
                        <table class="table table-striped table-bordered" style="margin-top:-25px;">
                            <thead >
                                <tr style="font-weight:bold;">
                                    <th> Matic </th>
                                    <th> Racing</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <br><tr>';

                                $query_matic = mysqli_query($connect, "SELECT * FROM `tb_token_voucher` WHERE Reedem = 'Online' and Kategori = 'Matic'");
                                $query_racing = mysqli_query($connect, "SELECT * FROM `tb_token_voucher` WHERE Reedem = 'Online' and Kategori = 'Racing'");
                                $data_matic = mysqli_num_rows($query_matic);
                                $data_racing = mysqli_num_rows($query_racing);
                                $total = $data_matic + $data_racing;
                                    $output .='<td>'.$data_matic.'</td>
                                    <td>'.$data_racing.'</td>';

                                $output .='</tr> </tbody>
                        </table>
                        <center>
                            <table class="table table-striped table-bordered" style="text-align: center;">
                                <center>
                                    <thead>
                                        <th>TOTAL</th>
                                    </thead>
                                    <tbody>
                                    <td>'.$total.'</td>
                                   </tbody>
                                </center>
                            </table>
                        </center>
                    </div>
                    <!-- /widget-content --></div> </div>
                </div>
        </div>';
echo($output);
 ?>
