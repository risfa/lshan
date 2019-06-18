<?php

	@session_start();
	@session_unset(); 
	@session_destroy();
	header( "Location: http://joker.5dapps.com/pertamina/lesehan2018/index.php?menu=home " );

?>