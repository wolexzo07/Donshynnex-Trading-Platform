<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("etoken") && x_validatepost("amtinusd") && x_validatepost("amtinbtc")){
	
	// Capturing users input
	
	$userid = x_clean(x_post("userid")); // Getting User ID
	$tranxid = x_clean(x_post("tranx_id")); // Getting User ID
	$token = x_clean(x_post("etoken")); // Getting Token
	$wallet = x_clean(x_post("wallet")); // Wallet type internal|external
	$amtinbtc = x_clean(x_post("amtinbtc")); // Amount in Btc
	$amtinusd = x_clean(x_post("amtinusd"));	// Amount in usd  
	$amtinnaira = x_clean(x_post("amtinnaira"));	// Amount in usd 
	//$senderaddr = x_clean(x_post("sender_btcaddr"));	// sender bitcoin address
	$companybtcaddr = x_clean(x_post("btc_addr_used"));	// company bitcoin address
	
	$f_amtinusd = "USD ".number_format($amtinusd,2);
	$f_amtinnaira = "NGN ".number_format($amtinnaira,2);
	
	$sellrate = x_getrates("buy_rate"); // Getting our Buying Rate
	$tim = x_curtime(0,0);$timer = x_curtime('0','1');
	$os = xos();$br = xbr();$ip = xip();
	$sellrate_f = "NGN ".number_format($sellrate,2)." / USD";
	
		// Validating Sender Btc address 
	if($wallet == "external"){
		$senderaddr = x_clean(x_post("sender_addr"));	
		 if(!x_validatebtc($senderaddr)){
			 echo "<p class='rtext'>Invalid sender bitcoin address!</p>";
			 exit();
		 }
		 

		}else{
		//$dbpath = "";
		$senderaddr = "";
		}
	// Validating Sender Btc address Ended
	
	// validating Proof of payment Started
		if(x_ischeckupload("upload")){
			$allowed_size = get_allowed_content("mediacontrol","photo","allowed_upload_size");
			$allowed_format = get_allowed_content("mediacontrol","photo","allowed_format_second");
			xcload("upload"); // checking upload status
			$size1 = x_size("upload"); // get file size
			$ext = x_file("upload"); // getting extension
			xcsize("upload",$allowed_size); // 1 mb max file size
			xtex("$allowed_format","upload");	// checking file extension
			$token1 = sha1(uniqid().$userid.Date("His"));
			$path1 = x_path("upload","btcpaymentproof/$token1"); // Hash fullpath
			$dbpath = x_path("upload","btcpaymentproof/$token1");
			
			xmload("upload",$path1,"");
			
			}else{
				$dbpath = "";
				x_print("<p class='rtext'>Kindly upload <b>BTC Payment</b> screenshot</p>");
				exit();
			}
				 // validating Proof of payment Ended
	
	// Inserting transaction details into the database

	x_insert("btcpaymentproof,naira_usd_rate,sender_btcaddress,company_btc_address,user_id,tranx_id,wallet_type,amount_in_btc,amount_in_usd,amount_in_naira,btc_recieve_status,transfer_money_status,os,br,ip,date_time","selling_transactions","'$dbpath','$sellrate','$senderaddr','$companybtcaddr','$userid','$tranxid','$wallet','$amtinbtc','$amtinusd','$amtinnaira','0','0','$os','$br','$ip','$timer'","<p class='rtext'>Transaction created! Details Below:</p><table class='table table-hover table-bordered'><tr><td>Amount (BTC)</td><th>$amtinbtc BTC</th></tr><tr><td>Amount (USD)</td><th>$f_amtinusd</th></tr><tr><td>Amount (NGN)</td><th>$f_amtinnaira</th></tr><tr><td>Rate</td><th>$sellrate_f</th></tr><tr><td>Status</td><th><font style='color:green;'>Pending</font></th></tr><tr><td>Tranx id</td><th><font style='color:purple;'>$tranxid</font></th></tr></table>","<p class='rtext'>Failed to create transaction</p>");
	
	// Insert another copy of this transaction into all transaction table
	
	x_insert("tranx_id,user_id,wallet_type,type,amount,wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'$tranxid','$userid','btc','sellbtc-$wallet','$amtinbtc','','0','$token','$os','$ip','$br','$timer','$tim'","&nbsp;","<p class='rtext'>Failed to create transaction copy</p>");
	
	//insert into nofication system
	
}else{
	echo "<p class='rtext'>Parameter missing!</p>";
}
?>