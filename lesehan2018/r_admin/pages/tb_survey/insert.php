<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  
 $sql = "INSERT INTO poll_qst(qst,opt1,opt2,opt3,opt4) VALUES('".$_GET["qst"]."', '".$_GET["opt1"]."', '".$_GET["opt2"]."', '".$_GET["opt3"]."', '".$_GET["opt4"]."', '".$_GET["opt5"]."')";  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted ';  
 }  
 ?> 