<?php 

	$output.='<div class="widget-header"> <i class="icon-list-alt"></i>
            <h3 style="margin-top:-20px;">Resume Penggunaan Voucher</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <table id="mytable" class="table">
                    	<thead style="font-weight: bolder; font:+2">
                        <tr>
							<td>No</td>                    		
							<td>Kode Voucher</td>                    		
                            <td>Pengguna</td>                           
							<td>Hadiah</td>                    		
							<td>Metode Penggunaan</td>                    		
							<td>Status</td>
                            </tr>                    		
                    	</thead>
                    	<tbody>';
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
$voucher = mysqli_query($connect,"SELECT * FROM tb_token_voucher");
while($Voucher = mysqli_fetch_array($voucher)){
    $pengguna = mysqli_query($connect,"SELECT * FROM tb_customer WHERE IdCustomer = '$Voucher[IdCustomer]'");
$data_pengguna = mysqli_fetch_array($pengguna);
$NO++;
                    $output.='<tr>
							<td>'.$NO.'</td>                    		
							<td>#'.$Voucher['NoVoucher'].'</td>
                            <td>'.$data_pengguna[Nama].' - '.$data_pengguna[Telepon].'<br>'.$data_pengguna[Email].'</td>                         
                            <td>'.$Voucher[Hadiahnya].'</td>                         
							<td>';
    if($Voucher['Reedem']=='Offline'){
        $output.= "<label class='label label-danger'>OFFLINE</label>";
    }
    elseif($Voucher['Reedem']=='Online'){
        $output.= "<label class='label label-success'>ONLINE</label>";
    } 
    // $Voucher['Reedem'].
    $output.='</td>                
    <td>';
	  if($Voucher['Status']<=0){
	  	$output.= "<label class='label label-success'>Available</label>";
    	}
    	elseif($Voucher['Status']<=1){
    	$output.= "<label class='label label-info'>Validation</label>";
    	}
    	elseif($Voucher['Status']<=2){
    	$output.= "<label class='label label-danger'>Used</label>";
    	}  
							$output.='</td>                    		
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
<script>
$(document).ready(function() {
            $.ajax({
                url: "voucher_api.php",
                method: "POST",

                success: function(data) {
                    $('#mytable').DataTable({
                        data : data,
                        columns: [
                                    { "data": "No" },
                                    { "data": "Kode Voucher" },
                                    { "data": "Pengguna" },
                                    { "data": "Hadiah" },
                                    { "data": "Metode Penggunaan" },
                                    { "data": "Status" }
                        ]
                    } );
                    
                }
            });
        });
</script>