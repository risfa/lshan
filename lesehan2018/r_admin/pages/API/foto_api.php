<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
 $sql = "SELECT * FROM tb_kategori_foto";
 $content = mysqli_query($connect,$sql);
 $id= 1;

 while($foto = mysqli_fetch_array($content)){

 	 $output.='<div class="widget">
                    <div class="widget-header"> <i class="icon-file"></i>';
       $output.='<h3 style="margin-top:-20px;">'.$foto['Kategori'].'</h3>

                    </div>
                    <div class="widget-content" style="overflow-y: auto; height:430px">';

          /*$posko="";
          if($_GET['posko_kota'] == 'POSKO BANYUMAS'){
            $posko = 4;
          }else if($_GET['posko_kota'] == 'POSKO NAGREK'){
            $posko = 1;
          }else if($_GET['posko_kota'] == 'POSKO CIREBON'){
            $posko = 3;
          }else if($_GET['posko_kota'] == 'POSKO MERAK'){
            $posko = 2;
          }*/
          // $_GET['posko_kota']== 4;
        $query3 = mysqli_query($connect,"SELECT * FROM `tb_foto` WHERE Timestamp_waktu LIKE '%$_GET[tanggal]%' AND IdLokasi = '$_GET[posko_kota]' AND IdKategoriFoto = '$foto[0]'  LIMIT 10");
        while ($data3 = mysqli_fetch_array($query3)) {
          $output.= '<div style="width:100px; height:100px; float:left; border:solid 1px red; padding:2px; margin:2px;"><button type="button" data-toggle="modal" data-target="#myModal'.$id.'"><img src="../apps/images_assets/photo/'.$foto[0].'/'.$data3[0].'.jpg" style="width:95px; height:95px; "></button>
            <center>
            <div class="modal fade" id="myModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style= margin-left:60vh;border:none;background:none;box-shadow:none; width:auto; height:500px;">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body" style="width:400px;">
                    <center>
                    <img src="../apps/images_assets/photo/'.$foto[0].'/'.$data3[0].'.jpg" style="width:100%;">
                    </center>
                  </div>
                </div>
              </div>
            </div>
            </center>';

          // $output .= "SELECT * FROM tb_lokasi WHERE IdLokasi = '$foto[1]'";
          
          $kode_lokasi = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_lokasi WHERE IdLokasi = '$_GET[posko_kota]'"));
          $output .='<br><center>'.$kode_lokasi[1].'<br>'.$data3[4].'</center></div>';
   $id++;
                             }
                   $output.='</div>
                </div>
            </div>';
            } 
echo ($output);
 ?>