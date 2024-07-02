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
		
		foreach(x_select("amount , wallet_type , user_id AS uid","transaction","token='$token' AND tranx_id='$tid'","1","id") as $trx){}
		
		$tranxamount = $trx["amount"]; $wallet_type = $trx["wallet_type"]; $uid = $trx["uid"];
		
		$wallet = fiatSwitches($wallet_type);
		
		// Crediting the user wallet
		
		x_updated("createusers","id='$uid'","$wallet = $wallet + $tranxamount","<script>showalert('Wallet credited successfully!');</script>","<script>showalert('Failed to credit user!');</script>");
		
		// Updating transaction status
		
		x_updated("transaction","token='$token' AND tranx_id='$tid'","status='1'","<script>showalert('Transaction status updated!');</script>","<script>showalert('Failed to update Transaction status!');</script>");
		
		// updating alert status
		
		if(sh_checkingTrx($tid , $token , "0") == "1"){ // validating transaction alert existence
			
			x_updated("alertus","token='$token' AND tranx_id='$tid'","status='1'","<script>showalert('Alert status updated!');</script>","<script>showalert('Failed to update alert status!');</script>");
			
		}
		
	}else{
		
		x_toasts("missing parameter");
		
	}

?>