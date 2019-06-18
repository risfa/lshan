<?php

$NoVoucher = $_GET['NoVoucher'];



 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  


 if ($query = mysqli_query($connect,"SELECT Id,NoVoucher FROM `tb_token_voucher` where NoVoucher = '$NoVoucher' AND Status = 0 ")) {
  $num_rows = mysqli_num_rows($query);
  if ($num_rows >= 1) {
       if(count($_FILES["file"]["name"]) > 0)
            {

             for($count=0; $count<count($_FILES["file"]["name"]); $count++)
             {
              $file_name = $_FILES["file"]["name"][$count];
              $tmp_name = $_FILES["file"]['tmp_name'][$count];
              $file_array = explode(".", $file_name);
              $file_extension = end($file_array);

              $location = '../../images_assets/photo/Kode_Voucher/'.$NoVoucher.'.jpg';
              if(move_uploaded_file($tmp_name, $location))
              {
            /*echo'<script>
            swal({
        title: "sukses upload foto voucher! #upload_photo_voucher.php",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=upload_photo_voucher";
        });
        </script>';*/

                  echo "sukses";
              }
             }
            }
  }else{
    // echo'<script>
    //  swal({
    //     title: "Kode Voucher Telah Terpakai! #upload_photo_voucher.php",
    //     type: "error" 
    //     }, function(){
    //     document.location.href="index.php?menu=upload_photo_voucher";
    //     });
    //     </script>';
      echo 'Kode Voucher Telah Terpakai';
  }
   
 }else{
 /*echo '<script>
 swal({
        title: "Error Proces Data! #upload_photo_voucher.php",
        type: "error" 
        }, function(){
        document.location.href="index.php?menu=upload_photo";
        });
        </script>';*/
   echo 'Error Proces Data';
 }
?>
