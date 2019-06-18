<?php 
        $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
        $sql5 = "SELECT * FROM `tb_spg`";
        $result5 = mysqli_query($connect,$sql5);
        $array = array();
        while ($data = mysqli_fetch_array($result5)) {
        	array_push($array, $data['flag']);
        }
            echo json_encode($array);
 ?>