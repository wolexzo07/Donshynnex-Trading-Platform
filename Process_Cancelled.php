<?php 

	if(isset($hasher)){
		
		$split = explode("-",$hasher);
		
		$tid = $split[0]; $token = $split[1];
		
		if(sh_checkingTrx($tid , $token , "1") == "0"){ // validating transaction existence
			
			x_toasts("Transaction not found!");
			
			exit();
		}
		
		if(sh_checkingTrxStatus($tid , $token , "1") == "1"){ // checking for approved status
			
			x_toasts("Transaction was approved before!");
			
			exit();
		}
		
		if(sh_checkingTrxStatus($tid , $token , "2") == "1"){ // checking for cancelled status
			
			x_toasts("Transaction was cancelled before!");
			
			exit();
		}
		
		
		// Updating transaction status
		
		x_updated("transaction","token='$token' AND tranx_id='$tid'","status='2'","<script>showalert('Transaction cancelled!');</script>","<script>showalert('Failed to update Transaction status!');</script>");
		
		// updating alert status
		
		if(sh_checkingTrx($tid , $token , "0") == "1"){ // validating transaction alert existence
			
			x_del("alertus","token='$token' AND tranx_id='$tid'","<script>showalert('Alert was deleted!');</script>","<script>showalert('Failed to delete alert!');</script>");
			
		}
		
	}else{
		
		x_toasts("missing parameter");
		
	}

?>