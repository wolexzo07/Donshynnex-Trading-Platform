<?php
if(x_validatepost("etoken") && x_validatepost("wallet") && x_validatepost("amountinbtc") ){

	if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
		
		$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]); // Getting User ID
		
	}else{
		
		$userid = $userid; // getting user if from app
		
	}
	
	$wallet = x_clean(x_post("wallet")); // currency Wallet type
	$cwallet = x_clean(x_post("crypto")); // crypto Wallet type
	$amtinbtc = x_clean(x_post("amountinbtc")); // Amount in crypto
	$amtinusd = x_clean(x_post("amountinusd"));	// Amount in usd 
	
	// checking for user validation
	
	if(sh_validateuser($userid) == "0"){
		
		x_toasts("Invalid user detected!");
		
		exit();
		
	}
	
	// Validations started
	
	if($wallet == ""){
		
		x_toasts("Fiat wallet is missing!");
		
		exit();
		
		}

	if($cwallet == ""){
		
		x_toasts("Crypto asset is missing!");
		
		exit();
		
		}
		
		
	if($amtinbtc == "" || !is_numeric($amtinbtc)){
		
		x_toasts("Crypto amount is missing!");
		
		exit();
		
		}
	
	
	// Validations ended
	
	$amtinusd = sh_getRatenCon($cwallet , $amtinbtc , "1");	// Amount in usd re-calculated
	$sellrate = sh_walletCurrentRate($wallet , "" , "2"); // Get current sell Rate
	$amtincurrency = sh_walletCurrentRate($wallet , $amtinusd , "4");	// dollar conversion to local currency

	$tranx_id = sh_genTrxbyid($userid , "BY"); // generate transaction id
	
	$token = sha1($tranx_id).md5($tranx_id);
	
	$os = xos();$br = xbr();$ip = xip();$timer = x_curtime('0','1');
	
	$create = x_dbtab("btransactions","
	user_id INT NOT NULL,
	tranx_id VARCHAR(255) NOT NULL,
	tranx_type  ENUM('','NGN-BTC','NGN-ETH','NGN-USDT','GHS-BTC','GHS-ETH','GHS-USDT','KSH-BTC','KSH-ETH','KSH-USDT') NOT NULL,
	wallet_used ENUM('','NGN','USD','KSH','GHS') NOT NULL,
	crypto_used ENUM('','BTC','ETH','USDT') NOT NULL,
	rate_used DOUBLE NOT NULL,
	amount_in_crypto DOUBLE NOT NULL,
	amount_in_usd DOUBLE NOT NULL,
	amount_in_currency DOUBLE NOT NULL,
	crypto_balance_before DOUBLE NOT NULL,
	crypto_balance_after DOUBLE NOT NULL,
	currency_balance_before DOUBLE NOT NULL,
	currency_balance_after DOUBLE NOT NULL,
	status ENUM('0','1','2') NOT NULL,
	os VARCHAR(50) NOT NULL,
	br VARCHAR(50) NOT NULL,
	ip VARCHAR(30) NOT NULL,
	date_time VARCHAR(100) NOT NULL
	","MYISAM");
	
	
	if($create){
		
		if(x_count("btransactions","tranx_id='$tranx_id' LIMIT 1") > 0){ // checking for duplicate transaction
			
			x_toasts("Transaction id exists!");
			
			exit();
			
		}
		
		$getCurrentBalance = sh_getFiatBalancebyUid("$wallet" , "$userid");
		
		if($amtincurrency > $getCurrentBalance){ // checking for balance sufficiency
			
			x_toasts("Insufficient wallet balance!");
			
			exit();
			
		}
		
		$nbalanceLocal = round($getCurrentBalance - $amtincurrency,2); $status = "0"; $tranx_type = $wallet."-".$cwallet;
		
		$crypto_balance_before = sh_getFiatBalancebyUid("$cwallet" , "$userid");

		$crypto_balance_after = $crypto_balance_before + $amtinbtc;

		
		// updating user wallet
		
		$db_wallet = sh_getCryptoFiatdb("$wallet"); $db_cwallet = sh_getCryptoFiatdb("$cwallet");
		
		x_updated("createusers","id='$userid'","$db_wallet=$nbalanceLocal , $db_cwallet=$crypto_balance_after","<script>showalert('Wallet credited successfully!');</script>","<script>showalert('Failed to credit wallet');</script>");
		
		// updating user wallet
		
		x_insert("user_id , tranx_id , tranx_type , wallet_used , crypto_used , rate_used , amount_in_crypto , amount_in_usd , amount_in_currency , crypto_balance_before , crypto_balance_after , currency_balance_before , currency_balance_after , status , os , br , ip , date_time","btransactions","'$userid' , '$tranx_id' , '$tranx_type' , '$wallet' , '$cwallet' , '$sellrate' , '$amtinbtc' , '$amtinusd' , '$amtincurrency' , '$crypto_balance_before' , '$crypto_balance_after' , '$getCurrentBalance' , '$nbalanceLocal' , '$status' , '$os' , '$br' , '$ip' , '$timer'","<script>showalert('Transaction processed successfully!');</script>","<script>showalert('Failed to process transaction');</script>");
		
	}else{
		
		x_toasts("Failed to create table!");
		
	}
	
	
}
?>