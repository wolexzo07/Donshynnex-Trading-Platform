<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");

	if(x_validatemethod("POST")){
		$uid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
		echo x_count("notification","user_id='$uid' AND status='0'");
	}
?>