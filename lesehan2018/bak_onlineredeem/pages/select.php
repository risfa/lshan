<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_token_voucher ORDER BY Id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
            <tr>  
                <td></td>  
                 
                <td id="NoVoucher" contenteditable></td>  
                <td id="Kategori" contenteditable></td>  
                <td id="Status" contenteditable></td>  
                <td id="Reedem" contenteditable></td>  
                   
           </tr>  
               
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["Id"].'</td>  
                      

                     <td class="Kendaraan_data" data-idKendaraan="'.$row["Id"].'" contenteditable>'.$row["NoVoucher"].'</td> 

                     <td class="Kendaraan_data" data-idKendaraan="'.$row["Id"].'" contenteditable>'.$row["Kategori"].'</td>

                     <td class="Kendaraan_data" data-idKendaraan="'.$row["Id"].'" contenteditable>'.$row["Status"].'</td> 

                     <td class="Kendaraan_data" data-idKendaraan="'.$row["Id"].'" contenteditable>'.$row["Reedem"].'</td> 

                      
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

