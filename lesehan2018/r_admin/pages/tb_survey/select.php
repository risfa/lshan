<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM poll_qst ORDER BY qst_id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="
    background: white;
">  

                <tr>  
                     <th>No</th>  
                     <th>Soal</th>  
                     <th>A</th>  
                     <th>B</th>  
                     <th>C</th>  
                     <th>D</th>  
                     <th>E</th>  

                     <th>Action</th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["qst_id"].'</td>  
                     <td class="qst_data" data-idqst="'.$row["qst_id"].'" contenteditable>'.$row["qst"].'</td> 

                     <td class="opt1_data" data-idopt1="'.$row["qst_id"].'" contenteditable>'.$row["opt1"].'</td>

                     <td class="opt2_data" data-idopt2="'.$row["qst_id"].'" contenteditable>'.$row["opt2"].'</td>

                     <td class="opt3_data" data-idopt3="'.$row["qst_id"].'" contenteditable>'.$row["opt3"].'</td>

                     <td class="opt4_data" data-idopt4="'.$row["qst_id"].'" contenteditable>'.$row["opt4"].'</td>  
                     <td class="opt5_data" data-idopt5="'.$row["qst_id"].'" contenteditable>'.$row["opt5"].'</td>  

                     <td><button type="button" name="delete_btn" data-id3="'.$row["qst_id"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>  
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