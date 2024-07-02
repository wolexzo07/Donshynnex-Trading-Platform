<?php
	session_start();
	include("../justlibrary/finishit.php");
	include("../justlibrary/cryptabuyExtension.php");
	
	if(x_validateget("hasher") && x_validateget("cmd")){
		
		$hasher = xg("hasher"); $cmd = xg("cmd"); $ptoken = sha1(uniqid());
		
		// admin Controller
		
		include("adminController.php");
		
		// user controller
		
		include("userController.php");
	}
?>