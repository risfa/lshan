<?php 
		$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018"); 
		$sql5 = "SELECT COUNT(IdCustomer) AS hasil FROM poll_answer";
		$result5 = mysqli_query($connect,$sql5);
		while($data5 = mysqli_fetch_array($result5))
		{
			
			
        

        

			$output.='<div class="widget widget-nopad">
                <div class="widget-content">
                    <div class="widget big-stats-container">
                        <div class="widget-content">
                            <div id="big_stats" class="cf">
                                <div class="stat">
                                    <h3>SUDAH SURVEY</h3> <span class="value">'.$data5['hasil'].'</span> </div>
                               
                            </div>
                        </div>

                    </div>
                </div> ';
            }
echo($output);
 ?>