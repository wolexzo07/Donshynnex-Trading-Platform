<?php
	
	if(!isset($ptoken)){
		
		exit();
		
	}
	
	include("supersu.php"); // Authenticating superuser
	
	// offline button manager
	
	if($cmd == "appr-ptranx"){
		
		include("process_Approved.php");
		
	}

	if($cmd == "cancel-ptranx"){
		
		include("process_Cancelled.php");
		
	}
	
	// seller button manager
	
	if($cmd == "confirm-coin"){
		
		include("confirmCoinPay.php");
		
	}
	
	if($cmd == "mark-paid"){
		
		include("processCoinPayout.php");
		
	}

	if($cmd == "cancel-coin"){
		
		include("CancelCoinPay.php");
		
	}

	// process wallet addition
	
	if($cmd == "add-wallet"){
		
		include("updateWallets.php");
		
	}

?>