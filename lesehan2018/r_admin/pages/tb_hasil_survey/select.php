<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_hasil_survey ORDER BY IdHasilSurvey DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  

                <tr>  
                     <th width="10%">Id Hasil Survey</th>  
                     <th width="10%">Id Transaksi</th>  
                     <th width="10%">Id Survey</th>  
                     <th width="10%">Id Jawaban Survey</th>  
                     <th width="40%">Hasil </th>     

                     <th width="10%">Action</th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["IdHasilSurvey"].'</td>  
                     <td>'.$row["IdTransaksi"].'</td>  
                     <td>'.$row["IdSurvey"].'</td>  
                     <td>'.$row["IdJawabanSurvey"].'</td>  

                     <td class="Hasil_data" data-idhasil="'.$row["IdHasilSurvey"].'" contenteditable>'.$row["Hasil"].'</td> 

                     <td><button type="button" name="delete_btn" data-id3="'.$row["IdHasilSurvey"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  

 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>