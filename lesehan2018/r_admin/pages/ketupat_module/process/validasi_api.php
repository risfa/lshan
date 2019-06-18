<?php 

$output.='
<script>
$("img").error(function(){
    $(this).attr("src", "../assets/noimg.gif");
});
</script>
<div class="widget-header"> <i class="icon-list-alt"></i>
<h3 style="margin-top:-20px;">Resume Penggunaan Voucher</h3>
</div>
<div class="widget-content">
<div class="widget big-stats-container">
<div class="widget-content">
<table class="table">
<thead style="font-weight: bolder; font:+2">
<td>No</td>                    		
<td>Kode Voucher</td>                    		
<td>Peserta</td>    
<td>Hadiah</td>    
<td>Status Hadiah</td>  
<td>Time</td>  		
<td>Dokumen</td>                    		
<td>Action</td>                    		
</thead>
<tbody>';
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
$voucher = mysqli_query($connect,"SELECT tb_token_voucher.*, tb_customer.StatusHadiah FROM tb_token_voucher
JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE StatusHadiah = 'PROSES_VALIDASI' OR StatusHadiah = 'MENUNGGU_VALIDASI' AND Status = '1'");

while($Voucher = mysqli_fetch_array($voucher)){
$pengguna = mysqli_query($connect,"SELECT * FROM tb_customer inner join tb_token_voucher on tb_customer.IdCustomer = tb_token_voucher.IdCustomer  WHERE tb_customer.IdCustomer = '$Voucher[IdCustomer]'");
$data_pengguna = mysqli_fetch_array($pengguna);
    $NO++;
    $output.='<tr>
    <td>'.$NO.'</td>                    		
    <td><font style="font-size:2/0px; font-weight:bolder; font-size:15px;">'.$Voucher['NoVoucher'].'</font></td>
    <td>'.$data_pengguna[Nama].' - '.$data_pengguna[Telepon].'<br>'.$data_pengguna[Email].'</td>         
    <td>'.$data_pengguna[Hadiahnya].'</td>           		         
    <td>'.$data_pengguna[StatusHadiah].'</td>
    <td>'.$data_pengguna[time_stamp].'</td>  
    ';
    // if($Voucher['Reedem']=='Offline'){
    //     $output.= "<label class='label label-danger'>OFFLINE</label>";
    // }
    // elseif($Voucher['Reedem']=='Online'){
    //     $output.= "<label class='label label-success'>ONLINE</label>";
    // } 
    // $Voucher['Reedem'].
   
    $output.='                    		
    <td>
    <a href="../images_assets/identitas/'.$Voucher[0].'.jpg" target="_blank" >
    <img src="../images_assets/identitas/'.$Voucher[0].'.jpg" style="height:50px; width:50px; " ></a>
    <a href="../images_assets/voucher/'.$Voucher[0].'.jpg" target="_blank">
    <img src="../images_assets/voucher/'.$Voucher[0].'.jpg" style="height:50px; width:50px;"></a></td>
    <td>
    <button class ="btn btn-info btn-xs" id="action" data-id3="'.$Voucher["Id"].'" data-id6="'.$data_pengguna["IdCustomer"].'">VALIDASI PEMENANG</button><br>
    <button class ="btn btn-danger btn-xs" id="batalkan" data-id4="'.$Voucher["Id"].'" data-id5="'.$data_pengguna["IdCustomer"].'" >BATALKAN &nbsp;&nbsp;VALIDASI</button>
    <button class ="btn btn-primary btn-xs" id="reminder_wa" data-id4="'.$Voucher["Id"].'" data-id5="'.$data_pengguna["IdCustomer"].'" >&nbsp;
         &nbsp;&nbsp;Reminder After 30 menit</button>
    </td>
    </tr>';                    		
}
$output.='</tbody>

</table>
</div>
<!-- /widget-content -->

</div>

</div>';


echo($output); 
?>