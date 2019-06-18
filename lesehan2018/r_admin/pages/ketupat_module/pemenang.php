<?php
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Data Tables</title>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body>
  <div class="col-md-12">
    <div class="widget widget-nopad" style="width: 98%">
        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3 style="margin-top:-20px;">Data Pemenang</h3>
        </div>
        <div class="widget-content">
</div>
 <div class="container">
  <h4>Data Pemenang</h4>
    <table id="table_id" class="table table-bordred table-striped" style="border: solid 1px #ccc; background: white;">

      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Telepon</th>
          <th>Alamat</th>
          <th>Sumber </th>
          <th>Status</th>
          <th>Email</th>
          <th>Hadiah</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $NO = 1 ;
        $voucher = mysqli_query($connect,"SELECT * FROM `tb_token_voucher` JOIN tb_customer ON tb_customer.IdCustomer = tb_token_voucher.IdCustomer WHERE Hadiahnya !='' AND Hadiahnya != 'Anda Belum Beruntung' AND Hadiahnya != 'Coba Lagi Ya Sob' AND Hadiahnya !='Dicoba Lagi ya Sob!' order by tb_token_voucher.time_stamp");
        while($Data = mysqli_fetch_array($voucher)){
          $lokasi = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_lokasi WHERE IdLokasi = '$Data[IdLokasi]'"));

          ?>

          <tr>
           <td><?php echo $NO  ?></td>
           <td><?php echo $Data['Nama']?></td>
           <td><?php echo $Data['Telepon'] ?></td>
           <td><?php echo $Data['Alamat'] ?></td>
           <td><?php echo $Data['Sumber']."-".$lokasi['Lokasi'] ?></td>
           <td><?php echo $Data['Status'] ?></td>
           <td><?php echo $Data['Email'] ?></td>
           <td><?php echo $Data['Hadiahnya'] ?></td>

              </tr>
              <?php
                $NO++;}
               ?>
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
             <script>
/*$(document).ready(function () {
$('#dataTables-example').dataTable();
});*/
</script>
<!--  -->
           </body>
           </html>
