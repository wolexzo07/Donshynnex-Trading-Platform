<?php
if(x_validatepost("etoken") && x_validatepost("wallet") && x_validatepost("amountinbtc") ){
	
	if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
		
		$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]); // Getting User ID
		
	}else{
		
		$userid = $userid; // getting user if from app
		
	}
	$wallet = x_clean(x_post("wallet")); // Wallet in use internal | external
	$amtinbtc = x_clean(x_post("amountinbtc")); // Sales Amount in crypto
	$amtinusd = x_clean(x_post("amountinusd"));	//  Sales Amount in usd 
	$payout = x_clean(x_post("fiat"));	// payout option
	
	// checking for user validation
	
	if(sh_validateuser($userid) == "0"){
		
		x_toasts("Invalid user detected!");
		
		exit();
		
	}
	
	// Validations started
	
	if($wallet == ""){
		
		x_toasts("Crypto wallet is missing!");
		
		exit();
		
		}

	if($payout == ""){
		
		x_toasts("Fiat payout is missing!");
		
		exit();
		
		}
		
	if($amtinbtc == "" || !is_numeric($amtinbtc)){
		
		x_toasts("Amount in crypto is missing!");
		
		exit();
		
		}
		
	// separating $wallet
	
	if($wallet == "external"){
		
		$cwallet = x_clean(x_post("wallet-external"));
		
	}

	if($wallet == "internal"){
		
		$cwallet = x_clean(x_post("wallet-internal"));
		
	}
		
		
	// Validations ended
	
	$amtinusd = sh_getRatenCon($cwallet , $amtinbtc , "1");	// Amount in usd recalculated
	$sellrate = sh_walletCurrentRate($payout , "" , "1"); // Getting our Buying Rate
	$amtinnaira = sh_walletCurrentRate($payout , $amtinusd , "3");	// dollar conversion to local currency
	$tranx_id = sh_genTrxbyid($userid , "SL");
	
	$token = sha1($tranx_id).md5($tranx_id);
	
	$os = xos(); $br = xbr(); $ip = xip(); $timer = x_curtime('0','1');
	
	$create = x_dbtab("stransactions","
	user_id INT NOT NULL,
	is_receipt_upload ENUM('0','1') NOT NULL,
	tranx_id VARCHAR(255) NOT NULL,
	crypto_in_use VARCHAR(10) NOT NULL,
	conversion_type VARCHAR(20) NOT NULL,
	wallet_type ENUM('','internal','external') NOT NULL,
	payout ENUM('','NGN','GHS','KSH','USD') NOT NULL,
	rate_used DOUBLE NOT NULL,
	amount_in_crypto DOUBLE NOT NULL,
	amount_in_usd DOUBLE NOT NULL,
	amount_in_currency DOUBLE NOT NULL,
	sender_crypto_address TEXT NOT NULL,
	company_crypto_address TEXT NOT NULL,
	crypto_wallet_balance DOUBLE NOT NULL,
	recieved_status ENUM('0','1','2') NOT NULL,
	transfer_money_status ENUM('0','1') NOT NULL,
	os VARCHAR(50) NOT NULL,
	br VARCHAR(50) NOT NULL,
	ip VARCHAR(30) NOT NULL,
	date_time VARCHAR(100) NOT NULL
	","MYISAM");
	
	
	if(!$create){
		
		x_toasts("Failed to create table!");
		 
		exit();
	}
	
	
	if(x_count("stransactions","tranx_id='$tranx_id' LIMIT 1") > 0){ // Validating duplicate transaction
		 
		 x_toasts("Duplicate Transaction <b>$tranx_id</b>");
		 
		 exit();
	 } 
	 
	 
	if($wallet == "internal"){
		
		include("internal.php");	
			
	}
	
	if($wallet == "external"){
		
			include("everythingExternal.php");
			
	}

}
?>