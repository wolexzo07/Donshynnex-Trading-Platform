<?php

	if(!isset($wallet)){
			
			exit();
			
		}
		
	$getdbv = sh_getCryptoFiatdb($cwallet);
			
	$btc_balance = x_getbalance("$getdbv",$userid); // Getting crypto Balance

	if($amtinbtc > $btc_balance){ // Validating crypto balance
		
		x_toasts("Insufficient crypto balance!");
		
		exit();
		
	}


	// Inserting Record into the database

	$new_btc_balance = $btc_balance - $amtinbtc;

	// Updating user btc wallet balance

	x_update("createusers","id='$userid'","$getdbv='$new_btc_balance'","","Failed to update");

	// Inserting transaction details into the database

	x_insert("crypto_in_use , conversion_type , user_id , tranx_id , wallet_type , payout , rate_used , amount_in_crypto , amount_in_usd , amount_in_currency , sender_crypto_address , company_crypto_address , crypto_wallet_balance , recieved_status , transfer_money_status , os , br , ip , date_time ","stransactions","'$cwallet','$cwallet-$payout','$userid' , '$tranx_id' , '$wallet' , '$payout' , '$sellrate' , '$amtinbtc' , '$amtinusd' , '$amtinnaira' , '' , '' , '$new_btc_balance' , '0' , '0' , '$os' , '$br' , '$ip' , '$timer' ","<script>showalert('Order submitted successfully!');</script>","<script>showalert('Failed to submit order!');</script>");
?>