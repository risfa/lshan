<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
 $sql = "SELECT * FROM tb_kategori_foto";
 $content = mysqli_query($connect,$sql);
 while($foto = mysqli_fetch_array($content)){

 	 $output.='<div class="widget">
                    <div class="widget-header"> <i class="icon-file"></i>';
       $output.='<h3>'.$foto['Kategori'].'</h3>

                    </div>
                    <div class="widget-content">';

        $query3 = mysqli_query($connect,"SELECT * FROM `tb_foto` WHERE IdKategoriFoto = '$foto[0]' ");
        while ($data3 = mysqli_fetch_array($query3)) {
        
          $output.= '<img src="../apps/images_assets/photo/'.$foto[0].'/'.$data3[0].'.jpg" width="100px" height="100px">';

                             }
                   $output.='</div>
                </div>
            </div>';
            } 

echo ($output);
 ?>