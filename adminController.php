<?php
	
	if(!isset($ptoken)){
		
		exit();
		
	}
	
	include("supersu.php"); // Authenticating superuser
	
	if($cmd == "appr-ptranx"){
		
		include("process_Approved.php");
		
	}

	if($cmd == "cancel-ptranx"){
		
		include("process_Cancelled.php");
		
	}

?>