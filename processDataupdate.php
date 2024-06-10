<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("account_update")){
	
	$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
	$name = x_clean(x_post("name"));
	$mobile = x_clean(x_post("mobile"));
	$email = x_clean(x_post("email"));
	$pass = x_clean(x_post("pass"));
	$hashed = md5($pass).md5("GraceofGod2020?");
	
	// validating data started
	
	if($name == ""){echo "Name is missing!";exit();}
	if($mobile == ""){echo "Enter valid mobile!";exit();}
	if($email == ""){echo "Enter valid email";exit();}
	if($pass == ""){echo "Enter password";exit();}
	
	// validating data ended
	
	if(x_count("createusers","id='$user' AND passkey='$hashed' LIMIT 1") > 0){
		
		// validating email existence on another user account
		
		if(x_count("createusers","email = '$email' AND id != '$user' LIMIT 1") > 0){
			x_print("<p class='rtext'>Email address taken!</p>");
			exit();
		}
		// validating mobile existence on another user account
		
		if(x_count("createusers","mobile = '$mobile' AND id != '$user' LIMIT 1") > 0){
			x_print("<p class='rtext'>Mobile number taken!</p>");
			exit();
		}
		// Finalizing account update
		
		x_updated("createusers","id='$user'","mobile = '$mobile',email = '$email'","<p class='rtext'>Account updated!</p>","<p class='rtext'>Account update failed!</p>");
		
		//updating session content
		
		$_SESSION["TIMBOSS_CRYPTBUY_EMAIL"] = $email;
		$_SESSION["TIMBOSS_CRYPTBUY_MOBILE"] = $mobile;
		
	}else{
		x_print("<p class='rtext'>Invalid password!</p>");
	}

	
}
?>