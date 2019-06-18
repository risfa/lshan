<?php 
	

	$output.= '<div class="widget widget-nopad" >
                            <div class="widget-header" title="Jumlah voucher yag disediakan untuk pembelian paket ketupat. Dapat di redeem baik melalui online maupun di posko Lesehan Enduro 2018"> <i class="icon-list-alt"></i>
                                <h3 style="margin-top:-20px;" >Hadiah Voucher</h3>
                            </div>';
                $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
                $jumlah_awal = 0 ;
                $jumlah = 0 ;
                $sql = "SELECT * FROM tb_hadiah WHERE Hadiah != 'Anda Belum Beruntung'";
                $result = mysqli_query($connect,$sql);
                while($total = mysqli_fetch_array($result)){
              $jumlah_awal += $total['Awal'];
              $jumlah += $total['Jumlah'];
                }
                       $output.='<div class="widget-content">
                             <div class="widget big-stats-container">
                                 <div class="widget-content">
                                    <div id="big_stats" class="cf">
                                          <div class="stat">
                                       <font style="font-size:20px;" >AWAL</font><br> <span class="value">'.$jumlah_awal.'</span> </div>';
                                                  
                                $output.='<div class="stat">
                  <font style="font-size:20px;" >SISA</font><br> <span class="value">'.$jumlah.'</span></div>';
                  
                  $terpakai_total = 0;
                  $sql = "SELECT * FROM `tb_hadiah`  WHERE Hadiah != 'Anda Belum Beruntung'";
                  $result = mysqli_query($connect,$sql);
                      while($terpakai = mysqli_fetch_array($result)){
                            $terpakai_total -= $terpakai['Jumlah'] -= $terpakai['Awal'];
                                   }
                   $output .='<div class="stat" >
                   <font style="font-size:20px;" >TERPAKAI</font><br> <span class="value">'.$terpakai_total.'</span> </div>';
                               
                                   $output .=  '</div>
                                     </div>
                                    </div>
                                </div>
                        </div>';
                                                            
                  
 echo($output);
 ?>