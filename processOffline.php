<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");

if(x_validatepost("etoken") && x_validatesession("TIMBOSS_CRYPTBUY_ID")){
	
	$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]); // Getting User ID
	$amount = x_clean(x_post("amount")); // Amount Paid
	$date = x_clean(x_post("date")); // Transaction Date
	
	$fiat = x_clean(x_post("fiat")); //Fiat type

	$note = x_clean(x_post("note")); // Transaction details
	
	$tranx_id = "OFTP".$userid.str_shuffle(DATE("YmdHis").strtoupper(uniqid()));
	
	// Validations started
	
	$allowed = ["GHS","NGN","KSH","USD"];
	
	if($amount == "" || !is_numeric($amount)){ x_toasts("Paid amount is missing!"); exit();}
	if($date == ""){ x_toasts("Transaction date is missing!");exit();}
	if($fiat == "" || !in_array($fiat , $allowed)){ x_toasts("Fiat type is missing!");exit();}
	if($note == ""){ x_toasts("Transaction details is missing!");exit();}
	
	$create = x_dbtab("alertus","
		tranx_id VARCHAR(255) NOT NULL,
		userid INT NOT NULL,
		amount DOUBLE NOT NULL,
		transfer_date DATE NOT NULL,
		note TEXT NOT NULL,
		date_time DATETIME NOT NULL,
		timereal VARCHAR(255) NOT NULL,
		type ENUM('topup','withdraw') NOT NULL,
		is_upload ENUM('0','1') NOT NULL,
		token TEXT NOT NULL,
		os VARCHAR(100) NOT NULL,
		br VARCHAR(100) NOT NULL,
		ip VARCHAR(50) NOT NULL,
		status ENUM('0','1') NOT NULL
	","MYISAM");
	
	$token = sha1($tranx_id).md5($tranx_id);
	
	$os = xos();$br = xbr();$ip = xip();$datetime = x_curtime('0','0');$timer = x_curtime('0','1');
	
	if($create){
		
		// checking for pending alert
		
		if(x_count("alertus","userid='$userid' AND type='topup' AND status='0' LIMIT 1") > 0){
			
			x_toasts("Untreated alert! please wait for response.");
			
			exit();
		}
		
		if(x_count("alertus","tranx_id = '$tranx_id' LIMIT 1") > 0){
			
			x_toasts("Transaction ID exist!");
			
		}else{
			
			// Handling receipt uploads
			
			include("uploadReciept.php");
			
			// Creating transaction record
			
			$cur_balance = sh_getFiatBalancebyUid($fiat , $userid); // Getting  current Balance
			
			$new_balance = $amount + $cur_balance;
			
			x_insert("topup_type,tranx_id,user_id,wallet_type,type,amount,balance_before, wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'offline','$tranx_id','$userid','$fiat','topup','$amount','$cur_balance','$new_balance','0','$token','$os','$ip','$br','$datetime','$timer'","0","<script>showalert('Failed to send transaction copy!');</script>");
			
			// Alert us entry
			
			x_insert("is_upload,tranx_id,userid,amount,transfer_date,date_time,timereal,type,status,token,os,br,ip,note","alertus","'$image_status','$tranx_id','$userid','$amount','$date','$datetime','$timer','topup','0','$token','$os','$br','$ip','$note'","<script>showalert('Alert sent successfully!');</script>","<script>showalert('Failed to notify!');</script>");
			
			if(x_count("alertus","tranx_id = '$tranx_id' LIMIT 1") > 0){ // update receipt status
				
				 x_update("filelogs","post_id='$post_id'","status='1'","&nbsp;","<script>showalert('Failed to update filelogs data')</script>");
				 
				 ?>
					<script>
						$("#resetAlert").click();
						$(".payoffine").hide(300);
						$(".listButton").show(300);
					</script>
				 <?php
			}
			
		}
	}else{
		x_print("<p class='rtext'>Failed to create table</p>");
	}
}
	
?>