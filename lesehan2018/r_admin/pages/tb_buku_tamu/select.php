<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $output = '';  
 $sql = "SELECT NamaLengkap,DariMana,Testimoni,Lokasi,Waktu FROM `tb_buku_tamu` INNER JOIN tb_lokasi on tb_lokasi.IdLokasi = tb_buku_tamu.IdLokasi ORDER BY DariMana";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
       <table class="table table-bordered" style="
    background: white;
">   

                <tr>  
                     <th width="10%">Nama </th>  
                     <th width="40%">Kategori</th>  
                     <th width="10%">Testimoni</th>
                     <th width="10%">Lokasi</th>  
                     <th width="10%">Waktu</th>  
                      
                     

                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["NamaLengkap"].'</td>  
                     <td class="Nama_data" data-idnama="'.$row["IdCustomer"].'" contenteditable>'.$row["DariMana"].'</td> 
                     <td class="Telepon_data" data-idtelepon="'.$row["IdCustomer"].'" contenteditable>'.$row["Testimoni"].'</td> 
                     <td class="Alamat_data" data-idalamat="'.$row["IdCustomer"].'" contenteditable>'.$row["Lokasi"].'</td> 
                     <td class="Sumber_data" data-idsumber="'.$row["IdCustomer"].'" contenteditable>'.$row["Waktu"].'</td> 
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
