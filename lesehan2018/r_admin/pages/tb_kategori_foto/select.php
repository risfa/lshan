<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT * FROM tb_kategori_foto ORDER BY IdKategoriFoto DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="
    background: white;
">  

                <tr>  
                     <th width="10%">Kategori</th>
                     <th width="10%">Jumlah Foto Per-Kategori</th>   
                     <th width="5%"></th>  

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
      $sqlfoto = mysqli_query($connect,"SELECT * FROM tb_foto WHERE IdKategoriFoto = '$row[0]'");
      $jumlahfoto = mysqli_num_rows($sqlfoto);
           $output .= '  
                <tr>  
                     <td class="Kategori_data" data-idkategori="'.$row["IdKategoriFoto"].'" contenteditable>'.$row["Kategori"].'</td> 
                     <td>'.$jumlahfoto.' Gambar </td>  

                     <td><button type="button" name="delete_btn" data-id3="'.$row["IdKategoriFoto"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>  
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