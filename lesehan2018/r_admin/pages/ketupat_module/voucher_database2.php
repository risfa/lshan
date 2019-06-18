<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Data Tables</title>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body>

 <div class="container">
  <h4>Resume pengguna Vouchers</h4>
  <div class="table-responsive"> 
    <table id="table_id" class="table table-bordred table-striped" style="border: solid 1px #ccc;">

      <thead>
        <tr>
          <th>No</th>                         
          <th>Kode Voucher</th>                           
          <th>Pengguna</th>                           
          <th>Hadiah</th>                         
          <th>Metode Penggunaan</th>                          
          <th>Status</th>
        </tr>             
      </thead>
      <tbody>
        <?php   
        $NO = 1 ;
        $voucher = mysqli_query($connect,"SELECT * FROM tb_token_voucher");
        while($Voucher = mysqli_fetch_array($voucher)){
          $pengguna = mysqli_query($connect,"SELECT * FROM tb_customer WHERE IdCustomer = '$Voucher[IdCustomer]'");
          $data_pengguna = mysqli_fetch_array($pengguna);
          ?>

          <tr>
           <td><?php echo $NO  ?></td>
           <td><?php echo $Voucher['NoVoucher']?></td>
           <td>-<?php echo $data_pengguna['Nama'].'<br>'.$data_pengguna['Telepon'].'<br>'.$data_pengguna['Email'] ?></td>
           <td><?php echo $Voucher['Hadiahnya'] ?></td>  
           <td>                       
             <?php  
             if($Voucher['Reedem']=='Offline'){
              ?>
              <label class='label label-danger'>OFFLINE</label>
              <?php } 
              elseif($Voucher['Reedem']=='Online'){
                ?>
                <label class='label label-success'>ONLINE</label></td>
                <?php } ?>  
                <!-- $Voucher['Reedem']. -->
                <td>
                  <?php 
                  if($Voucher['Status']<=0){
                    ?>
                    <label class='label label-success'>Available</label>
                    <?php } 
                    elseif($Voucher['Status']<=1){
                      ?>
                      <label class='label label-info'>Validation</label>
                      <?php } 
                      elseif($Voucher['Status']<=2){
                        ?>
                        <label class='label label-danger'>Used</label>
                        <?php } 
                        $NO++;}?>
                      </td>
              </tr>
                    </tbody>
                    <!-- data Tables -->
                    <script>
                      $(document).ready(function()
                      {
                       $('#table_id').dataTable();
                     });
                   </script>

                   <!-- END -->
                 </table>
               </div>
             </div>

           </body>
           </html>
