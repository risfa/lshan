<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_lokasi ORDER BY IdLokasi DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="
    background: white;
">   

                <tr>  
                     <th>Lokasi</th>             
                     <th>Latitude</th>  
                     <th>Longitude</th>             
                     <th>Action</th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  

                     <td class="Lokasi_data" data-idlokasi="'.$row["IdLokasi"].'" contenteditable>'.$row["Lokasi"].'</td> 
                     <td class="Latitude_data" data-idlatitude="'.$row["IdLokasi"].'" contenteditable>'.$row["Latitude"].'</td> 
                     <td class="Longitude_data" data-idlongitude="'.$row["IdLokasi"].'" contenteditable>'.$row["Longitude"].'</td> 
                     <td><button type="button" name="delete_btn" data-id3="'.$row["IdLokasi"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>  
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