<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("etoken") && x_validatesession("TIMBOSS_CRYPTBUY_ID")){
	
	$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]); // Getting User ID
	$amount = x_clean(x_post("amount")); // Amount Paid
	$date = x_clean(x_post("date")); // Transaction Date
	$urbank = x_clean(x_post("yourbank"));	// Users Bank
	$companybank = x_clean(x_post("ourbank")); // company bank used
	$nameonacct = x_clean(x_post("nameonacct")); // Name on account used
	$note = x_clean(x_post("note")); // Extra Note
	$tranx_id = "CRTP".$userid.str_shuffle(DATE("YmdHis"));
	
	// Validations started
	
	if($amount == "" || !is_numeric($amount)){echo "<p class='rtext'>Amount paid is missing!</p>";exit();}
	if($date == ""){echo "<p class='rtext'>Transaction date is missing!</p>";exit();}
	if($urbank == ""){echo "<p class='rtext'>Your bank is missing!</p>";exit();}
	if($companybank == ""){echo "<p class='rtext'>Company bank is missing!</p>";exit();}
	if($nameonacct == ""){echo "<p class='rtext'>Name on account is missing!</p>";exit();}
	
	$create = x_dbtab("alertus","
	tranx_id VARCHAR(255) NOT NULL,
	paid_into VARCHAR(255) NOT NULL,
	userid INT NOT NULL,
	amount DOUBLE NOT NULL,
	bankname VARCHAR(255) NOT NULL,
	acctname VARCHAR(255) NOT NULL,
	transfer_date DATE NOT NULL,
	date_time DATETIME NOT NULL,
	timereal VARCHAR(255) NOT NULL,
	type ENUM('topup','withdraw') NOT NULL,
	status ENUM('0','1') NOT NULL,
	token TEXT NOT NULL,
	os VARCHAR(100) NOT NULL,
	br VARCHAR(100) NOT NULL,
	ip VARCHAR(50) NOT NULL,
	note TEXT NOT NULL
	
	","MYISAM");
	$token = sha1($userid.$tranx_id).md5($userid.uniqid());
	$os = xos();$br = xbr();$ip = xip();$datetime = x_curtime('0','0');$timer = x_curtime('0','1');
	if($create){
		if(x_count("alertus","tranx_id = '$tranx_id' LIMIT 1") > 0){
			x_print("<p class='rtext'>Transaction ID exist!</p>");
		}else{
			
			// Insert data into alertus table in database
			
			x_insert("tranx_id,paid_into,userid,amount,bankname,acctname,transfer_date,date_time,timereal,type,status,token,os,br,ip,note","alertus","'$tranx_id','$companybank','$userid','$amount','$urbank','$nameonacct','$date','$datetime','$timer','topup','0','$token','$os','$br','$ip','$note'","<p class='rtext'>Alert sent! please do not resend!</p>","<p class='rtext'>Failed to send alert!</p>");
			
			// Duplicating transaction
			
			$ngn_balance = x_getbalance("naira_wallet",$userid); // Getting NGN Balance
			$new_balance = $amount + $ngn_balance;
			
			x_insert("topup_type,tranx_id,user_id,wallet_type,type,amount,wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'offline','$tranx_id','$userid','ngn','topup','$amount','$new_balance','0','$token','$os','$ip','$br','$datetime','$timer'","&nbsp;","<p class='rtext'>Failed to create transaction copy</p>");
		}
	}else{
		x_print("<p class='rtext'>Failed to create table</p>");
	}
}
	
?>