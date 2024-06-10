<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("etoken") && x_validatepost("wallet") && x_validatepost("amountinbtc") ){
	
	$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]); // Getting User ID
	$wallet = x_clean(x_post("wallet")); // Wallet type internal|external
	$amtinbtc = x_clean(x_post("amountinbtc")); // Amount in Btc
	$amtinusd = x_clean(x_post("amountinusd"));	// Amount in usd 
	
	
	// Validations started
	
	if($wallet == ""){echo "<p class='rtext'>Payment wallet missing</p>";exit();}
	if($amtinbtc == "" || !is_numeric($amtinbtc)){echo "<p class='rtext'>Enter amount in BTC</p>";exit();}
	
	//if($amtinusd == "" || !is_numeric($amtinusd)){echo "Enter amount in usd";exit();}
	
	// Validations ended
	
	$amtinusd = x_btc2usdnf($amtinbtc);	// Amount in usd recalculated
	$sellrate = x_getrates("sell_rate"); // Getting Selling Rate
	$amtinnaira = $amtinusd * $sellrate;	// Amount in naira Based on selling rate
	$tranx_id = "CRBY".$userid.str_shuffle(DATE("YmdHis"));
	
	$token = sha1($userid).md5($userid.uniqid());
	$os = xos();$br = xbr();$ip = xip();$timer = x_curtime('0','1');
	
	$create = x_dbtab("buying_transactions","
	user_id INT NOT NULL,
	tranx_id VARCHAR(255) NOT NULL,
	wallet_used ENUM('','NGN','USD') NOT NULL,
	wallet_type ENUM('','internal','external') NOT NULL,
	naira_usd_rate DOUBLE NOT NULL,
	amount_in_btc DOUBLE NOT NULL,
	amount_in_usd DOUBLE NOT NULL,
	amount_in_naira DOUBLE NOT NULL,
	btc_wallet_balance DOUBLE NOT NULL,
	naira_wallet_balance DOUBLE NOT NULL,
	btc_recieve_status ENUM('0','1','2') NOT NULL,
	os VARCHAR(50) NOT NULL,
	br VARCHAR(50) NOT NULL,
	ip VARCHAR(30) NOT NULL,
	date_time VARCHAR(100) NOT NULL
	","MYISAM");
	
	
	if($create){
	
	// Validating duplicate transaction
	 if(x_count("buying_transactions","tranx_id='$tranx_id' LIMIT 1") > 0){
		 x_print("<p class='rtext'>Transaction <b>$tranx_id</b> already exit</p>");
	 }else{
		if($wallet == "internal"){
			$btc_balance = x_getbalance("btc_wallet",$userid); // Getting BTC Balance
			$ngn_balance = x_getbalance("naira_wallet",$userid); // Getting NGN Balance
			
			// Validating the balance in the user naira wallet
			
			if($amtinnaira > $ngn_balance){
				x_print("<p class='rtext'>Insufficient Naira Balance</p>");
			}else{
				
	// Inserting Record into the database
	
	$new_btc_balance = round(($btc_balance + $amtinbtc),8) ; // Btc New Balance
	$new_naira_balance = round(($ngn_balance - $amtinnaira),2) ; // NGN New Balance
	
	// Updating user btc wallet balance
	
	x_update("createusers","id='$userid'","naira_wallet='$new_naira_balance',btc_wallet='$new_btc_balance'","","Failed to update");
	
	// Inserting transaction details into the database
	$f_amtinusd = "USD ".number_format($amtinusd,2); // formatted amount in usd
	$f_amtinnaira = "NGN ".number_format($amtinnaira,2); // formatted amount in ngn
	$f_ngnbalance = "NGN ".number_format($new_naira_balance,2); // formatted amt in ngn
	
	$sellrate_f = "NGN ".number_format($sellrate,2)." / USD";
	
	x_insert("naira_wallet_balance,naira_usd_rate,wallet_used,btc_wallet_balance,user_id,tranx_id,wallet_type,amount_in_btc,amount_in_usd,amount_in_naira,btc_recieve_status,os,br,ip,date_time","buying_transactions","'$new_naira_balance','$sellrate','NGN','$new_btc_balance','$userid','$tranx_id','$wallet','$amtinbtc','$amtinusd','$amtinnaira','1','$os','$br','$ip','$timer'","<p class='rtext'>Transaction created! Details Below:</p><table class='table table-hover table-bordered'><tr><td>Amount (BTC)</td><th>$amtinbtc BTC</th></tr><tr><td>Amount (USD)</td><th>$f_amtinusd</th></tr><tr><td>Amount (NGN)</td><th>$f_amtinnaira</th></tr><tr><td>Buy Rate</td><th>$sellrate_f</th></tr><tr><td>Status</td><th><font style='color:purple;'><i class='fa fa-check-circle'></i>&nbsp; Approved</font></th></tr><tr><td>Tranx id</td><th><font style='color:purple;'>$tranx_id</font></th></tr></table>","<p class='rtext'>Failed to create transaction</p>");
	
	// Insert another copy of this transaction into all transaction table
	$tim = x_curtime(0,0);
	x_insert("tranx_id,user_id,wallet_type,type,amount,wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'$tranx_id','$userid','btc','buybtc','$amtinbtc','$new_btc_balance','1','$token','$os','$ip','$br','$timer','$tim'","&nbsp;","<p class='rtext'>Failed to create transaction copy</p>");
	
	//insert into nofication system
	
	}
			
		}elseif($wallet == "external"){
			
		}else{
			x_print("Invalid wallet detected");
		}
	 }
	
	
	}else{
		x_print("Failed to create table!");
	}
	
	
}
	
	
	?>