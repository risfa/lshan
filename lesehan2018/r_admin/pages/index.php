 <?php 
        $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
        $output='';   
        $sql = "SELECT SUM(Mobil) AS Mobil FROM `tb_traffic_kendaraan`";  

         $result = mysqli_query($connect, $sql);

        while($data = mysqli_fetch_array($result)){

        $output .='';
  ?>

   <?php
                            $output='';   
                            $sql2 = "SELECT SUM(Motor) AS Motor FROM `tb_traffic_kendaraan`";  

                             $result2 = mysqli_query($connect, $sql2); 
                             while($data = mysqli_fetch_array($result2)){
                             ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">