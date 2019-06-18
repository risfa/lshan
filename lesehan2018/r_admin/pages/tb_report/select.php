<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 // $sql = "SELECT * FROM tb_hadiah JOIN tb_lokasi ON tb_lokasi.IdLokasi = tb_hadiah.IdHadiah ORDER BY IdHadiah DESC";  
 $sql = "SELECT * FROM tb_report INNER JOIN tb_lokasi on  tb_report.IdLokasi = tb_lokasi.IdLokasi ORDER BY Keterangan ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  

           <table class="table table-bordered" style="
    background: white;
">  

                <tr>  
                     <th >Keterangan</th>  
                     <th >Message</th>  
                     <th >Lokasi</th>  
                     <th >Waktu</th>
                     <th >Status</th>    

                </tr>';  
 // $output .= '  
 //      <div class="table-responsive">  
 //           <table class="table table-bordered">  

 //                <tr>  
 //                     <th width="10%">IdHadiah</th>  
 //                     <th width="10%">IdLokasi</th>  
 //                     <th width="40%">Hadiah</th>  
 //                     <th width="40%">Jumlah</th>  
 //                     <th width="10%">Status</th>
 //                     <th width="10%">Kategori</th>  
 //                     <th width="10%">Action</th>    

 //                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
           <style>
           .td_special{
            background:white;
           }
           </style>
                <tr>  
                     <td  class="Hadiah_data td_special" data-idhadiah="'.$row["Keterangan"].'" contenteditable>'.$row["Keterangan"].'</td> 
                     <td class="Jumlah_data td_special" data-idjumlah="'.$row["Message"].'" contenteditable>'.$row["Message"]. '</td> 
                     <td class="Awal_data " data-idawal="'.$row["Lokasi"].'" >'.$row["Lokasi"]. '</td>';


                     $output.=' <td class="Awal_data " data-idawal="'.$row["Waktu"].'" >'.$row["Waktu"]. '</td>';

                     if ($row['Status'] == 0) {
                        $output.='<td class="td_special"><button type="button" name="delete_btn" data-id3="'.$row["Id"].'" class="btn btn-xs btn-danger btn_change_succes">Belom dikerjakan</button></td>';  
                     }else{
                       $output.='<td class="td_special"><button type="button" name="delete_btn" data-id3="'.$row["Id"].'" class="btn btn-xs btn-success btn_change_unsucces">Sudah dikerjakan</button></td>';  
                     }

                    
                     
                $output.='</tr>  
           ';  

      }  

 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  ';  
 echo $output;  
 ?>