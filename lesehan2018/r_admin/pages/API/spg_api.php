<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 

$output.='<div class="widget widget-table action-table">
<div class="widget-header"> <i class="icon-th-list"></i>
<h3 style="margin-top:-20px;"> OTS CREW STATUS</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th> Nama SPG </th>
<th> Lokasi</th>
<th> Status</th>

</tr>
</thead>
<tbody>
<tr>';
$query2 = mysqli_query($connect,"SELECT * FROM tb_spg JOIN tb_lokasi ON tb_lokasi.IdLokasi = tb_spg.IdLokasi");
while($data2=mysqli_fetch_array($query2)){

    $output.='<td>'.$data2['Nama'].'</td>
    <td>'.$data2['Lokasi'].'</td>
    <td class="td-actions">Online</td>';
}

$output.='</tr>

</tbody>
</table>

</div>
</div>';


echo($output);
?>