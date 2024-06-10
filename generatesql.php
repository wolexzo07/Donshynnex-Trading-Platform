<?php
include("../justlibrary/finishit.php");
if(x_validateget("cmd")){
	
	$cmd = xg("cmd");
	
	if($cmd == "start"){
		
		// Generating user table
		
		$create = x_dbtab("createusers","
		btc_wallet DOUBLE NOT NULL,
		naira_wallet DOUBLE NOT NULL,
		dollar_wallet DOUBLE NOT NULL,
		photo_path TEXT NOT NULL,
		name VARCHAR(255) NOT NULL,
		mobile VARCHAR(12) NOT NULL,
		email VARCHAR(255) NOT NULL,
		passkey TEXT NOT NULL,
		bank_name VARCHAR(150) NOT NULL,
		acct_number VARCHAR(50) NOT NULL,
		acct_name VARCHAR(255) NOT NULL,
		token TEXT NOT NULL,
		os VARCHAR(50) NOT NULL,
		ip VARCHAR(50) NOT NULL,
		br VARCHAR(100) NOT NULL,
		date_time VARCHAR(200) NOT NULL,
		role ENUM('0','1','2') NOT NULL,
		status ENUM('0','1','2') NOT NULL
		","MYISAM");
		
		// 0 = normal ; 1 = superadmin ; 2 = admin
		
		if($create){
			x_print("<p class='success'>Users Table Created successfully<p>");
		}else{
			x_print("<p class='failed'>Failed to Create Users Table<p>");
		}
		
		// Generating Rates Table
		
		$create = x_dbtab("rates","
		buy_rate DOUBLE NOT NULL,
		sell_rate DOUBLE NOT NULL,
		btc_current_rate DOUBLE NOT NULL,
		status ENUM('0','1') NOT NULL
		","MYISAM");
		
		if($create){
			x_print("<p class='success'>Rates Table Created successfully<p>");
		}else{
			x_print("<p class='failed'>Failed to Create Rates Table<p>");
		}
		
		// Generating Transaction Table
		
		$create = x_dbtab("transaction","
		user_id VARCHAR(10) NOT NULL,
		wallet_type ENUM('','ngn','btc','usd') NOT NULL,
		type ENUM('','topup','withdraw','sellbtc','buybtc') NOT NULL,
		amount DOUBLE NOT NULL,
		wallet_balance_after DOUBLE NOT NULL,
		status ENUM('0','1','2') NOT NULL,
		token TEXT NOT NULL,
		os VARCHAR(100) NOT NULL,
		ip VARCHAR(30) NOT NULL,
		br VARCHAR(100) NOT NULL,
		date_time VARCHAR(200) NOT NULL,
		time_stamp DATETIME NOT NULL
		","MYISAM");
		
		// 0 = pending ; 1 = approved ; 2 = cancelled
		
		if($create){
			x_print("<p class='success'>Transaction Table Created successfully<p>");
		}else{
			x_print("<p class='failed'>Failed to Create Transaction Table<p>");
		}
		
		// Generating Notification Table
		
		$create = x_dbtab("notification","
		user_id VARCHAR(10) NOT NULL,
		type ENUM('p','all') NOT NULL,
		title VARCHAR(255) NOT NULL,
		message TEXT NOT NULL,
		status ENUM('0','1','2') NOT NULL,
		date_time VARCHAR(200) NOT NULL,
		time_stamp DATETIME NOT NULL
		","MYISAM");
		
		
		if($create){
			x_print("<p class='success'>Notification Table Created successfully<p>");
		}else{
			x_print("<p class='failed'>Failed to Create Notification Table<p>");
		}
		
		
		// Generating Admin Bank Details Table
		
		$create = x_dbtab("adminbank","
		bank_name VARCHAR(100) NOT NULL,
		acct_name VARCHAR(100) NOT NULL,
		acct_numb VARCHAR(100) NOT NULL,
		btc_addr TEXT NOT NULL,
		status ENUM('0','1') NOT NULL
		","MYISAM");
		
		if($create){
			x_print("<p class='success'>Admin Bank Details Table Created successfully<p>");
			if(x_count("adminbank","status='1' LIMIT 1") > 0){
				
			}else{
				//Populating initial data
				$bn = "ZENITH BANK";
				$ac = "BIOBAKU OLUWOLE TIMOTHY";
				$an = "2177929814";
				$btc = "19UNMWJujqB5iNM3A3L72uAGXPnYq99rVc";
				
				x_insert("bank_name,acct_name,acct_numb,btc_addr,status","adminbank","'$bn','$ac','$an','$btc','1'","<p class='success'>Admin Banking Details populated Successfully!<p>","<p class='failed'>Admin Banking Details population Failed!<p>");
			}
			
		}else{
			x_print("<p class='failed'>Failed to create Admin Bank Details Table<p>");
		}
		
	}else{
		x_print("Invalid command issued");
	}
}
?>
<style type="text/css">
.success{
	color:purple;
	font-weight:bold;
	word-spacing:1pt;
}
.failed{
	color:red;
	font-weight:bold;
	word-spacing:1pt;
}
</style>