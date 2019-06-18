<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_message  ORDER BY Id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  

                <tr>  
                     <b><th style="auto;">Id</th></b>  
                     <th style="auto;">IdLokasi</th>  
                     <th style="auto;>Judul</th>
                     <th style="auto;>Message</th>
                     <th style="auto;Keterangan</th>
                     <th style="auto;>Tampilkan</th>


                     <th width="10%">Action</th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["Id"].'</td>  
                     <td>'.$row["IdLokasi"].'</td>  
                     <td class="Judul_data" data-idjudul="'.$row["Id"].'" contenteditable>'.$row["Judul"].'</td> 
                     <td class="Message_data" data-idmessage="'.$row["Id"].'" contenteditable>'.$row["Message"].'</td> 
                     <td class="Keterangan_data" data-idketerangan="'.$row["Id"].'" contenteditable>'.$row["Keterangan"].'</td> 
                     <td class="Tampilkan_data" data-idTampilkan="'.$row["Id"].'" contenteditable>'.$row["Tampilkan"].'</td> 

                     <td><button type="button" name="delete_btn" data-id3="'.$row["Id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
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