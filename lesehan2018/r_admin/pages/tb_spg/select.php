<?php  
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
$output = '';  
$sql = "SELECT * FROM tb_spg ORDER BY IdPj DESC";  
$result = mysqli_query($connect, $sql);  
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered" style="
background: white;">  

<tr>  
<b><th style="width:auto;" >Kode SPG</th></b>  
<th >IdLokasi</th>  
<th>Nama</th>  
<th >Telepon</th>   
<th >Username</th>  
<th >Action</th>  

</tr>';  
if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
  $sqlLokasi = mysqli_query($connect,"SELECT * FROM tb_lokasi WHERE IdLokasi = '$row[IdLokasi]'");
  $datalokasi = mysqli_fetch_array($sqlLokasi);
   $output .= '  
   <tr>  
   <td style="font-weight:bold;">#'.$row["IdPj"].'</td>  
   <td>'.$datalokasi[1].'</td>  
   <td class="Nama_data" data-idnama="'.$row["IdPj"].'" contenteditable>'.$row["Nama"].'</td> 


   <td class="Telepon_data" data-idtelepon="'.$row["IdPj"].'" contenteditable>'.$row["Telepon"].'</td> 


   <td class="Username_data" data-idusername="'.$row["IdPj"].'" contenteditable>'.$row["Username"].'</td> 

   <td><button type="button" name="delete_btn" data-id3="'.$row["IdPj"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>  
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