<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating superuser

if(x_validateget("token") && x_validateget("tid")){
	$token = xg("token");
	$tid = xg("tid");
	
	// validating transaction
	if(x_count("transaction","id='$tid' AND token='$token'") > 0){
		
	// Getting the transaction amount
	$amount = x_getsingle("SELECT amount FROM transaction WHERE id='$tid' AND token='$token' LIMIT 1","transaction WHERE id='$tid' AND token='$token' LIMIT 1","amount");
	
	// Getting the transaction id
	$tranx_id = x_getsingle("SELECT tranx_id FROM transaction WHERE id='$tid' AND token='$token' LIMIT 1","transaction WHERE id='$tid' AND token='$token' LIMIT 1","tranx_id");
	
	// Getting the user id
	$userid = x_getsingle("SELECT user_id FROM transaction WHERE id='$tid' AND token='$token' LIMIT 1","transaction WHERE id='$tid' AND token='$token' LIMIT 1","user_id");
	
	// Getting the user real name
	$namex = x_getsingle("SELECT name FROM createusers WHERE id='$userid' LIMIT 1","createusers WHERE id='$userid' LIMIT 1","name");
	
	// Getting the user real email
	
	$email = x_getsingle("SELECT email FROM createusers WHERE id='$userid' LIMIT 1","createusers WHERE id='$userid' LIMIT 1","email");
	
	// Getting user Naira wallet balance
	$ngn_wallet = x_getsingle("SELECT naira_wallet FROM createusers WHERE id='$userid' LIMIT 1","createusers WHERE id='$userid' LIMIT 1","naira_wallet");
	
	$new_amount = $ngn_wallet + $amount;
	
	// Approving the alert info
		x_update("alertus","tranx_id='$tranx_id' AND userid='$userid'","status='1'","&nbsp;","Failed");
		
	// Approving the Transaction and crediting  wallet
		x_update("createusers","id='$userid'","naira_wallet='$new_amount'","&nbsp;","Failed");
	// Crediting user wallet balance
	x_update("transaction","id='$tid' AND token='$token'","status='1'","&nbsp;","Failed");
	
	// Sending notification to user by mail and dashboard
	
	$company = x_getsingle("select company_name from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","company_name");
	
	$rtimen = x_curtime("0","1");
	$stimen = x_curtime("0","0");
	$refamt = number_format($amount,2);
	x_insert("type,title,user_id,message,status,date_time,time_stamp","notification","'p','<b>NGN $refamt</b> WAS CREDITED TO YOUR WALLET.','$userid','<p>Hi <b>$namex</b>,</p>Your wallet has been credited with the amount (<b>NGN $refamt</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>$company TEAM</b>','0','$rtimen','$stimen'","Approved","Failed");
	
	// Send mail notification
	
	include("offline_Payment_Approval_Mailer.php");
	
	}else{
		echo "Invalid tranx";
	}
	
	
}
?>