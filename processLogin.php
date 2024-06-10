<?php
include("../justlibrary/finishit.php");
if(x_validatepost("etoken") && x_validatepost("userpass") && x_validatepost("userlogin") ){

	$user = x_clean(x_post("userlogin"));
	$pass = x_clean(x_post("userpass"));
	$hashed = md5($pass).md5("GraceofGod2020?");

	// Validations started
	
	if($user == ""){echo "Enter user ID";exit();}
	if($pass == ""){echo "Enter password";exit();}
	
	// Validations ended
	
	$os = xos();$br = xbr();$ip = xip();$timer = x_curtime('0','1');
	
	$createdb = x_dbtab("createusers","
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
	
	if($createdb){

			if(x_count("createusers","email='$user' AND passkey='$hashed' OR mobile='$user' AND passkey='$hashed' LIMIT 1") > 0){
				foreach(x_select("email,name,id,mobile,token,bank_name,acct_name,acct_number,photo_path","createusers","email='$user' AND passkey='$hashed' OR mobile='$user' AND passkey='$hashed'","1","id") as $account){
					$id = $account["id"];$email = $account["email"];
					$name = $account["name"];$mobile = $account["mobile"];
					$token = $account["token"];$ph = $account["photo_path"];
					
					
					// bank details
					$bn = $account["bank_name"];
					$acn = $account["acct_name"];
					$acnum = $account["acct_number"];
					
				}
				session_start();
				$_SESSION["TIMBOSS_CRYPTBUY_ID"] = $id;
				$_SESSION["TIMBOSS_CRYPTBUY_MOBILE"] = $mobile;
				$_SESSION["TIMBOSS_CRYPTBUY_NAME"] = $name;
				$_SESSION["TIMBOSS_CRYPTBUY_EMAIL"] = $email;
				$_SESSION["TIMBOSS_CRYPTBUY_TOKEN"] = $token;
				$_SESSION["TIMBOSS_CRYPTBUY_PATH"] = $ph;
				
				
				// Banking account details
				$_SESSION["TIMBOSS_CRYPTBUY_BKN"] = $bn;
				$_SESSION["TIMBOSS_CRYPTBUY_ACN"] = $acn;
				$_SESSION["TIMBOSS_CRYPTBUY_ACNUM"] = $acnum;
				
				finish("dashboard","0");
			}else{
				echo "Invalid login details!";
			}
			
		
	}else{
		echo "Failed to create table";
	}
	
}
?>