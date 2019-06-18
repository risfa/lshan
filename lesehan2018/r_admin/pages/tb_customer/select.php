<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_customer ORDER BY IdCustomer DESC LIMIT 10";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
       <table class="table table-bordered" style="
    background: white;
">   

                <tr>  
                     <th width="10%">IdCustomer</th>  
                     <th width="40%">Nama</th>  
                     <th width="10%">Telepon</th>
                     <th width="10%">Alamat</th>  
                     <th width="10%">Sumber</th>  
                     <th width="10%">Email</th>  
                      
                     

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["IdCustomer"].'</td>  
                     <td class="Nama_data" data-idnama="'.$row["IdCustomer"].'" contenteditable>'.$row["Nama"].'</td> 
                     <td class="Telepon_data" data-idtelepon="'.$row["IdCustomer"].'" contenteditable>'.$row["Telepon"].'</td> 
                     <td class="Alamat_data" data-idalamat="'.$row["IdCustomer"].'" contenteditable>'.$row["Alamat"].'</td> 
                     <td class="Sumber_data" data-idsumber="'.$row["IdCustomer"].'" contenteditable>'.$row["Sumber"].'</td> 
                     <td class="Email_data" data-idemail="'.$row["IdCustomer"].'" contenteditable>'.$row["Email"].'</td> 
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
     <!--                 <td><button type="button" name="delete_btn" data-id3="'.$row["IdCustomer"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  -->