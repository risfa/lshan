<?php


 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

$kategori = $_GET['kategori'];


$IdLokasi = $_GET['IdLokasi'];

$IdSpg = $_GET['IdSpg'];

   $sql = "INSERT INTO `tb_foto` (`IdFoto`, `IdLokasi`, `IdKategoriFoto`, `IdSpg`) VALUES (NULL, '$IdLokasi', '$kategori', '$IdSpg');";  




 if(mysqli_query($connect, $sql))  
 {  
  $last_id = mysqli_insert_id($connect);


    if ($kategori == '1') {

         if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/photo/1/'.$last_id.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
        echo "<script>swal({
        title: 'sukses upload foto! #upload_photo.php',
        type: 'success' 
        }, function(){
        document.location.href='index.php?menu=upload_photo';
        });
        </script>";
            // echo "sukses";
          }
         }
        }

    }else if($kategori == '2'){
       if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/photo/2/'.$last_id.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
      echo '<script>swal({
        title: "sukses upload foto! #upload_photo.php",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=upload_photo";
        });
        </script>';

            // echo "sukses";
          }
         }
        }

    }else if($kategori == '3'){
       if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/photo/3/'.$last_id.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
            echo'<script>swal({
        title: "sukses upload foto! #upload_photo.php",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=upload_photo";
        });
        </script>';

            // echo "sukses";
          }
         }
        }

    }else if($kategori == '4'){
       if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/photo/4/'.$last_id.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
            echo '<script>swal({
        title: "sukses upload foto! #upload_photo.php",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=upload_photo";
        });
        </script>';

            // echo "sukses";
          }
         }
        }

    }else if($kategori == '5'){
       if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/photo/5/'.$last_id.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
            echo '<script>swal({
        title: "sukses upload foto! #upload_photo.php",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=upload_photo";
        });
        </script>';

            // echo "sukses";
          }
         }
        }

    }else{
      if(count($_FILES["file"]["name"]) > 0)
        {

         for($count=0; $count<count($_FILES["file"]["name"]); $count++)
         {
          $file_name = $_FILES["file"]["name"][$count];
          $tmp_name = $_FILES["file"]['tmp_name'][$count];
          $file_array = explode(".", $file_name);
          $file_extension = end($file_array);

          $location = '../../images_assets/photo/lainnya/'.$last_id.'.jpg';
          if(move_uploaded_file($tmp_name, $location))
          {
            echo '<script>swal({
        title: "sukses upload foto! #upload_photo.php",
        type: "success" 
        }, function(){
        document.location.href="index.php?menu=upload_photo";
        });
        </script>';

            // echo "sukses";
          }
         }
        }


    }



 }  







?>
