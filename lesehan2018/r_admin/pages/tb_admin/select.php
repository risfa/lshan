<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 // $sql = "SELECT * FROM tb_hadiah JOIN tb_lokasi ON tb_lokasi.IdLokasi = tb_hadiah.IdHadiah ORDER BY IdHadiah DESC";
 $No = 1;  
 $sql = "SELECT * FROM tb_admin ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  

           <table class="table table-bordered" style="
    background: white;
">  

                <tr>  
                      
                     <th >Username</th>  
                     <th >Password</th>  
                     <th >Status</th>
                     <th >Action</th>    

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     
                     <td class="Username_data" data-idusername="'.$row["Id"].'" contenteditable>'.$row["Username"].'</td> 
                     <td class="Password_data" data-idpassword="'.$row["Id"].'" contenteditable>'.$row["Password"].'</td>';
                     if($row['Status'] == 1 ){  
                     $output .= '<td class="Status_data"><label class="label label-success">1 > Admin</label></td>'; 
                      }else if($row['Status'] == 2){
                        $output .= '<td class="Status_data"><label class="label label-info">2 > Customer</label></td>';
                      }
                     $output .= '<td><button type="button" name="delete_btn" data-id3="'.$row["Id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
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