<?php 
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
$quiz = "SELECT COUNT(IdCustomer) AS total FROM quiz_answer";
$total = mysqli_query($connect,$quiz);
while($Hasil1 = mysqli_fetch_array($total)){
    $hasil = 0;
	$output.='<div class="widget widget-nopad">
                        <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <div id="big_stats" class="cf">
                                        <div class="stat">
                                            <h3>SUDAH QUIZ</h3>';
                                         $hasil = $Hasil1['total'] ;
                                         $output.='<span>class="value">'.$hasil.'</span> </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>';
                } 
echo($output);
 ?>