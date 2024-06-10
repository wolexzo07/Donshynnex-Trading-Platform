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
	
	
	
	// Deleting the alert info
	
	x_del("alertus","tranx_id='$tranx_id' AND userid='$userid'","&nbsp;","Failed");
		
	// Deleting Transaction Ref 
	
	x_del("transaction","id='$tid' AND token='$token'","&nbsp;","Failed");
	
	// Sending notification to user by mail and dashboard
	
	$company = x_getsingle("select company_name from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","company_name");
	
	$rtimen = x_curtime("0","1");
	$stimen = x_curtime("0","0");
	$refamt = number_format($amount,2);
	x_insert("type,title,user_id,message,status,date_time,time_stamp","notification","'p','PAYMENT OF <b>NGN $refamt</b> WAS CANCELLED.','$userid','<p>Hi <b>$namex</b>,</p>Your payment of (<b>NGN $refamt</b>) was cancelled because we could not verify your payment.You can reach us for more clarification on this transaction (Tranx ID : <b>$tranx_id</b>). Ensure you have the transaction ID ready incase you want to reach us. Thank you.<br/><br/><b>$company TEAM</b>','0','$rtimen','$stimen'","Cancelled","Failed");
	
	// Send mail notification
	
	include("offline_Payment_Cancel_Mailer.php");
	
	}else{
		echo "Invalid tranx";
	}
	
	
}
?>