<?php
	session_start();
	include("../justlibrary/finishit.php");
	include("../justlibrary/cryptabuyExtension.php");
	
	if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){}else{
		finish("register","0");
		exit();
	}

	$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
	$uname = x_clean($_SESSION["TIMBOSS_CRYPTBUY_NAME"]);
	$path = x_clean($_SESSION["TIMBOSS_CRYPTBUY_PATH"]);
	//$str = $uname;
	$split = explode(" ",$uname);
	$namex = $split[0];
	$uid = $user;
	$ptoken = sha1(uniqid().$uid);
	$userid = $user;

	if($path == ""){
		
		$path_img =  "img/avatar.png";
		
	}else{
		
		if(file_exists($path)){
			
			$path_img = $path;
			
		}else{
			
			$path_img = "img/avatar.png";
			
		}
	}
?>