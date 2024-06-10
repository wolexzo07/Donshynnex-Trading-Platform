<?php
include("../justlibrary/finishit.php");
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
	
	if($mobile != "" || !is_numeric($mobile) || strlen($mobile) > 15){echo "Enter valid number";exit();}
	if($name == ""){echo "Please enter Name";exit();}
	if(!$validEmail){echo "Enter valid email";exit();}
	if($pass == ""){echo "Please enter password";exit();}
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
	
	if($createdb){
		if(x_count("createusers","email='$email' LIMIT 1") > 0){
			echo "Email taken!";
		}elseif(x_count("createusers","mobile='$mobile' LIMIT 1") > 0){
			echo "Mobile taken!";
		}else{
			x_insert("name,mobile,email,passkey,token,os,ip,br,date_time,status","createusers","'$name','$mobile','$email','$hashed','$token','$os','$ip','$br','$timer','1'","Registration successful ! Wait <img src='img/ajax-loader.gif'/>","Failed to insert");
			
			// Redirecting to dashboard After registration
			
			if(x_count("createusers","email='$email' LIMIT 1") > 0){
				foreach(x_select("email,name,id,mobile","createusers","email='$email'","1","id") as $account){
					$id = $account["id"];$email = $account["email"];
					$name = $account["name"];$mobile = $account["mobile"];
					//$fiat = $account["fiat"];
				}
				session_start();
				$_SESSION["TIMBOSS_CRYPTBUY_ID"] = $id;
				$_SESSION["TIMBOSS_CRYPTBUY_MOBILE"] = $mobile;
				$_SESSION["TIMBOSS_CRYPTBUY_NAME"] = $name;
				$_SESSION["TIMBOSS_CRYPTBUY_EMAIL"] = $email;
				//$_SESSION["TIMBOSS_CRYPTBUY_FIAT"] = $fiat;
				?>
				<script>
				setTimeout(function(){
					window.location = "dashboard";
				},5000);
				</script>
				<?php
			}
			
		}
	}else{
		echo "Failed to create table";
	}
	
}
?>