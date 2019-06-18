<?php 

           $output .='<div class="widget widget-nopad" style="cursor:pointer; title="Voucher yang telah di redeem baik secara online maupun di Posko Lesehan Enduro 2018, dibagi atas Enduro Racing & Enduro Matic">
            <div class="widget-header" id="open_tab"> <i class="icon-list-alt"></i>
                <h3 title="Voucher yang telah di redeem baik secara online maupun di Posko Lesehan Enduro 2018, dibagi atas Enduro Racing & Enduro Matic" style="margin-top:-20px;">Jumlah Pembelian Berdasarkan Redeem Voucher</h3>
            </div>';

            $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
            $jumlah_racing = 0 ; 
            $sqli = "SELECT COUNT(Kategori) AS Racing FROM tb_token_voucher WHERE Kategori='Racing'";
            $results = mysqli_query($connect,$sqli);
            while($data = mysqli_fetch_array($results)){
             $jumlah_racing = $data['Racing'];
                                 }
             $output .='<div class="widget-content">
                 <div class="widget big-stats-container">
                    <div class="widget-content">
                      <div id="big_stats" class="cf">
                           <div class="stat">
                  <h1 style="margin-top:-10px;"><img style="height:20px;" src="http://joker.5dapps.com/pertamina/lesehan2018/assets/racing.png"></h1> <span class="value" style="font-size:30px;">'.$jumlah_racing.'</span> </div>';
                                  
            $jumlah_matic = 0 ;                      
            $sqli1 = "SELECT COUNT(Kategori) AS Matic FROM tb_token_voucher WHERE Kategori='Matic'";
            $results1 = mysqli_query($connect,$sqli1);
            while($data1 = mysqli_fetch_array($results1)){
            $jumlah_matic = $data1['Matic'];   
                                    } 
                $output .='<div class="stat"><h1 style="margin-top:-10px;"><img style="height:20px;" src="http://joker.5dapps.com/pertamina/lesehan2018/assets/matic.png"></h1> <span class="value" style="font-size:30px;">'.$jumlah_matic.'</span> </div>';
                                            
            $query = "SELECT COUNT(kategori) AS total FROM tb_token_voucher";
            $hasil = mysqli_query($connect,$query);
            while($jumlah = mysqli_fetch_array($hasil)){

                // $output .='<div style="display:none" class="stat"><h1 style="margin-top:-10px;">TOTAL</h1> <span class="value" style="font-size:30px;">'.$jumlah['total'].'</span> </div>';

             
             // $output .= '<div class="stat">
             // <h1>TOTAL</h1> <span class="value">'.$jumlah['total'].'</span></div>';
                                } 
                                                   
                          $output .='</div>
                        </div>
                        <!-- /widget-content -->

                    </div>
                </div>
        </div>';

        $output.= "<script>     

                    $('#open_tab').click(function(){
                        location.href='http://joker.5dapps.com/pertamina/lesehan2018/r_admin/index.php?menu=laporan_redeem_voucher_summary';
                        })

                    </script>
                    ";

echo ($output);
 ?>