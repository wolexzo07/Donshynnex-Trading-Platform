<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("account_update")){
	
	$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);

	$pass = x_clean(x_post("pass"));
	$hashed = md5($pass).md5("GraceofGod2020?");
	
	$pass2 = x_clean(x_post("pass2"));
	$hashed2 = md5($pass2).md5("GraceofGod2020?");
	
	// validating data started
	
	if($pass2 == ""){echo "Enter new password";exit();}
	if($pass == ""){echo "Enter old password";exit();}
	
	// validating data ended
	
	if(x_count("createusers","id='$user' AND passkey='$hashed' LIMIT 1") > 0){
		
		// Finalizing account update
		
		x_updated("createusers","id='$user'","passkey = '$hashed2'","<p class='rtext'>Password updated!</p>","<p class='rtext'>Account update failed!</p>");
		
	}else{
		x_print("<p class='rtext'>Invalid password!</p>");
	}

	
}
?>