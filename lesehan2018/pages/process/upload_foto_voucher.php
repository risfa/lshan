<?php



$IdTransaksi = $_GET['IdTransaksi'];







         if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/voucher/'.$IdTransaksi.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
            echo'<script>swal({
        title: "sukses upload foto voucher",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=home";
        });
        </script>';
            // echo "sukses";
          }
         }
        }











?>
