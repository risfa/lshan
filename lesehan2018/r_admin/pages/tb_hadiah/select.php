<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 // $sql = "SELECT * FROM tb_hadiah JOIN tb_lokasi ON tb_lokasi.IdLokasi = tb_hadiah.IdHadiah ORDER BY IdHadiah DESC";  
 $sql = "SELECT * FROM tb_hadiah ORDER BY Status ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  

           <table class="table table-bordered" style="
    background: white;
">  

                <tr>  
                     <th >Hadiah</th>  
                     <th >Jumlah</th>  
                     <th >Jumlah Awal</th>  
                     <th >Status</th>
                     <th >Action</th>    

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
                     <td  class="Hadiah_data td_special" data-idhadiah="'.$row["IdHadiah"].'" >'.$row["Hadiah"].'</td> ';

                     if ($row['Status'] == 'aktif') {
                     $output.='<td class="Jumlah_data td_special" data-idjumlah="'.$row["IdHadiah"].'" style="font-weight:bolder; font-size:20px; text-align:center;">'.$row["Jumlah"]. '</td> 
                     <td class="Awal_data " data-idawal="'.$row["IdHadiah"].'"  style="font-weight:bolder; font-size:20px; text-align:center;">'.$row["Awal"]. '</td>
                     <td class="td_special"><button type="button" name="delete_btn" data-id3="'.$row["IdHadiah"].'" class="btn btn-xs btn-success btn_update_aktif">AKTIF</button></td>';
                     }else{
                     $output.='<td class="Jumlah_data td_special" data-idjumlah="'.$row["IdHadiah"].'" style="font-weight:bolder; font-size:20px; color:#ececec; text-align:center;">'.$row["Jumlah"]. '</td> 
                     <td class="Awal_data " data-idawal="'.$row["IdHadiah"].'"  style="font-weight:bolder; font-size:20px;color:#ececec; text-align:center;">'.$row["Awal"]. '</td> <td class="td_special"><button type="button" name="delete_btn" data-id3="'.$row["IdHadiah"].'" class="btn btn-xs btn-danger btn_update_non_aktif">DISAKTIF</button></td>' ;
                     } 

                     $output.='<td class="td_special"><button type="button" name="delete_btn" data-id3="'.$row["IdHadiah"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>';  
                     
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