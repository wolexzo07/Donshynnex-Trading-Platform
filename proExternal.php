<?php
if(x_validatepost("etoken") && x_validatepost("amtinusd") && x_validatepost("amtinbtc")){
	
	// Capturing users input

	if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
		
		$userid = x_clean(x_post("userid")); // Getting User ID
		
	}else{
		
		$userid = $userid; // getting user if from app
		
	}
	
	$tranx_id = x_clean(x_post("tranx_id")); // Transaction id
	$token = x_clean(x_post("etoken")); // Getting Token
	$wallet = x_clean(x_post("wallet")); // Wallet type internal | external
	$cwallet = x_clean(x_post("cwallet")); // Wallet type internal | external
	$amtinbtc = x_clean(x_post("amtinbtc")); // Amount in crypto

	$companybtcaddr = x_clean(x_post("addr_used"));	// company crypto address
	$useraddr = x_clean(x_post("sender_addr"));	// sender crypto address
	$payout = x_clean(x_post("payout"));	// Fiat payout
	

	$amtinusd = sh_getRatenCon($cwallet , $amtinbtc , "1");	// Amount in usd recalculated
	$sellrate = sh_walletCurrentRate($payout , "" , "1"); // Getting our Buying Rate
	$amtinnaira = sh_walletCurrentRate($payout , $amtinusd , "3");	// dollar conversion to local currency
	
	// checking for user validation
	
	if(sh_validateuser($userid) == "0"){
		
		x_toasts("Invalid user detected!");
		
		exit();
		
	}
	
	// Validations started
	
	
	if($wallet != "external"){
		
		x_toasts("Crypto wallet type is missing!");
		
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
	
	$tim = x_curtime(0,0); $timer = x_curtime('0','1'); $os = xos(); $br = xbr(); $ip = xip();
	
	if(x_count("stransactions","tranx_id='$tranx_id' LIMIT 1") > 0){ // Validating duplicate transaction
		 
		 x_toasts("Duplicate Transaction <b>$tranx_id</b>");
		 
		 exit();
	 } 
	 
	 
	/***$getdbv = sh_getCryptoFiatdb($cwallet);
			
	$btc_balance = x_getbalance("$getdbv",$userid); // Getting crypto Balance

	if($amtinbtc > $btc_balance){ // Validating crypto balance
		
		x_toasts("Insufficient crypto balance!");
		
		exit();
		
	}
****/
		
	// Handling upload
	
	include("uploadReciept.php");
	
	// Inserting Record into the database
			
	//new_btc_balance = $btc_balance - $amtinbtc;

	// Updating user btc wallet balance
	
	//x_update("createusers","id='$userid'","$getdbv='$new_btc_balance'","","Failed to update");
	
	// Inserting transaction details into the database
			
	x_insert("is_receipt_upload ,crypto_in_use , conversion_type , user_id , tranx_id , wallet_type , payout , rate_used , amount_in_crypto , amount_in_usd , amount_in_currency , sender_crypto_address , company_crypto_address , crypto_wallet_balance , recieved_status , transfer_money_status , os , br , ip , date_time ","stransactions","'$image_status','$cwallet','$cwallet-$payout','$userid' , '$tranx_id' , '$wallet' , '$payout' , '$sellrate' , '$amtinbtc' , '$amtinusd' , '$amtinnaira' , '$useraddr' , '$companybtcaddr' , '0' , '0' , '0' , '$os' , '$br' , '$ip' , '$timer' ","<script>showalert('Order submitted successfully!');</script>","<script>showalert('Failed to submit order!');</script>");
	
}
?>