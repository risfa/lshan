<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_jawaban_quiz ORDER BY IdJawabanQuiz DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  

                <tr>  
                     <th width="10%">Id Jawaban Quiz</th>  
                     <th width="10%">Id Quiz</th>  
                     <th width="40%">Jawaban</th>             
                     <th width="10%">Action</th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["IdJawabanQuiz"].'</td>  
                     <td>'.$row["IdQuiz"].'</td>  

                     <td class="Jawaban_data" data-idjawaban="'.$row["IdJawabanQuiz"].'" contenteditable>'.$row["Jawaban"].'</td> 

                     <td><button type="button" name="delete_btn" data-id3="'.$row["IdJawabanQuiz"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
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