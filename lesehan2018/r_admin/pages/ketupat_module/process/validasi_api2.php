<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
$voucher = mysqli_query($connect,"SELECT COUNT(NoVoucher) AS VOUCHER FROM tb_token_voucher");
// while($noVoucher = mysqli_fetch_array($voucher)){
$output.='<div class="widget-content">
                    <div id="big_stats" class="cf" name="Mobil">';
//                         <div class="stat">
//                             <font><i style="font-size:18px;" class="fas fa-plus">&nbsp;Total Keseluruhan</i> </font> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$noVoucher["VOUCHER"].'</span> </div>';
//                         }

// $voucher1 = mysqli_query($connect,"SELECT COUNT(Status) AS status1 FROM tb_token_voucher WHERE Status = '1'");
$jumlahvalidasi = mysqli_query($connect, "SELECT tb_token_voucher.*, tb_customer.StatusHadiah FROM tb_token_voucher
JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE StatusHadiah = 'PROSES_VALIDASI' AND Status = '1'");

$Voucher1 = mysqli_num_rows($jumlahvalidasi);
                      $output.='<div class="stat"><font><i style="font-size:18px;" class="fas fa-clock">&nbsp;Menunggu Verifikasi</i> </font> <span style="font-size:70px; font-weight:bolder;" class="value" value="">'.$Voucher1.'<br></span> </div>';

$voucher2 = mysqli_query($connect,"SELECT COUNT(Status) AS status2 FROM tb_token_voucher WHERE Status = '2'");
// while($Voucher2 = mysqli_fetch_array($voucher2)){
//                        $output.='<div class="stat"><font><i style="font-size:18px;" class="fas fa-check">&nbsp;Terpakai</i> </font> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$Voucher2['status2'].'</span> </div>';
//                    }

$voucher = mysqli_query($connect,"SELECT COUNT(Status) AS status FROM tb_token_voucher WHERE Status = '0'");
// while($Voucher = mysqli_fetch_array($voucher)){
//                      $output.='<div class="stat"><font><i style="font-size:18px;" class="fab fa-buromobelexperte">&nbsp;Sisa Tersedia</i> </font> <span style="font-size:30px; font-weight:bolder;" class="value" value="">'.$Voucher['status'].'</span> </div>';
//                     }

//                     $output.='</div>
//                 </div>';

echo($output);
 ?>