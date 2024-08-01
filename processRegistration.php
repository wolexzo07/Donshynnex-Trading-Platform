<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");

if(x_validatepost("etoken") && x_validatepost("mobile") && x_validatepost("name") ){

	$name = x_clean(x_post("name"));
//$fiat = x_clean(x_post("fiat"));
	$mobile = x_clean(x_post("mobile"));
	$email = x_clean(x_post("email"));
	$pass = x_clean(x_post("passkey"));
	$hashed = md5($pass).md5("GraceofGod2020?");
	$token = sha1($mobile).md5($email.uniqid());
	
	$regExp = "/^[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z_+])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$/";
	$validEmail = preg_match($regExp,$email);
	
	//$validMobile = x_checkmobile($mobile);
	
	// Validations started
	
	if($mobile == "" || !is_numeric($mobile) || strlen($mobile) > 15){
		
		x_toasts("Enter valid number");
		
		exit();
		
		}
		
	if($name == ""){
		
		x_toasts("Please enter Name");
		
		exit();
		
		}
		
		
	if(!$validEmail){
		
		x_toasts("Enter valid email");
		
		exit();
		
		}
	
	if($pass == ""){
		
		x_toasts("Please enter password");
		
		exit();
		
		}
	
	//if($fiat == ""){echo "Please select fiat";exit();}
	
	// Validations ended
	
	$os = xos();$br = xbr();$ip = xip();$timer = x_curtime('0','1');
	
	$createdb = x_dbtab("createusers","
		fiat ENUM('','USD','NGN','GHS','KSH') NOT NULL,
		btc_wallet DOUBLE NOT NULL,
		eth_wallet DOUBLE NOT NULL,
		usdt_wallet DOUBLE NOT NULL,
		naira_wallet DOUBLE NOT NULL,
		cedis_wallet DOUBLE NOT NULL,
		cephas_wallet DOUBLE NOT NULL,
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
	
	if(!$createdb){
		
		x_toasts("Failed to create table");
		
		exit();
		
	}
		
	if(x_count("createusers","email='$email' LIMIT 1") > 0){
		
		x_toasts("Email taken!");
		
		exit();
		
	}
	
	if(x_count("createusers","mobile='$mobile' LIMIT 1") > 0){
		
		x_toasts("Mobile taken!");
		
		exit();
	}
			
	x_insert("name,mobile,email,passkey,token,os,ip,br,date_time,status","createusers","'$name','$mobile','$email','$hashed','$token','$os','$ip','$br','$timer','1'","<script>showalert('Registration was successful!');</script>","<script>showalert('Registration failed!');</script>");
	
	// Redirecting to dashboard
	
	if(x_count("createusers","email='$email' LIMIT 1") > 0){
		
		foreach(x_select("0","createusers","email='$email'","1","id") as $account){
			
			$id = $account["id"]; $email = $account["email"]; $name = $account["name"]; 
			
			$mobile = $account["mobile"]; $token = $account["token"]; $ph = $account["photo_path"];
			
			$bn = $account["bank_name"]; $acn = $account["acct_name"]; $acnum = $account["acct_number"];
					
		}
		
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
		
		
		?>
		
		<script>
			setTimeout(function(){
				window.location = "dashboard";
			},5000);
		</script>
		
		<?php
		
	}
	
}

?>