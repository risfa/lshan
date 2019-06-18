<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_jawaban_survey ORDER BY IdJawabanSurvey DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  

                <tr>  
                     <th width="10%">Id Jawaban Survey</th>  
                     <th width="10%">Id Survey</th>  
                     <th width="40%">Jawaban </th>             
                     <th width="10%">Action</th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["IdJawabanSurvey"].'</td>  
                     <td>'.$row["IdSurvey"].'</td>  

                     <td class="Jawaban_data" data-idjawaban="'.$row["IdJawabanSurvey"].'" contenteditable>'.$row["Jawaban"].'</td> 

                     <td><button type="button" name="delete_btn" data-id3="'.$row["IdJawabanSurvey"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
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