<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("account_update")){
	
	$user = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);

	$pass = x_clean(x_post("pass"));
	$hashed = md5($pass).md5("GraceofGod2020?");
	
	
	// validating data started

	if($pass == ""){echo "Enter old password";exit();}
	
	// validating data ended
	
	if(x_count("createusers","id='$user' AND passkey='$hashed' LIMIT 1") > 0){
	
		// Capturing data;
			if(x_ischeckupload("fileUpload")){
				
		// Getting current photo
		$ph = x_getsingle("Select photo_path from createusers where id='$user' LIMIT 1","createusers where id='$user' LIMIT 1","photo_path");
		
		// checking for the existence of the photo in the filepath
		if(file_exists($ph)){
			unlink($ph);
		}
		
		$allowed_size = get_allowed_content("mediacontrol","photo","allowed_upload_size");
		$allowed_format = get_allowed_content("mediacontrol","photo","allowed_format_second");
		xcload("fileUpload"); // checking upload status
		$size1 = x_size("fileUpload"); // get file size
		$ext = x_file("fileUpload"); // getting extension
		xcsize("fileUpload",$allowed_size); // 1 mb max file size
		xtex("$allowed_format","fileUpload");	// checking file extension
		$token1 = sha1(uniqid().$user.Date("His"));
		$path1 = x_path("fileUpload","photo-keeper/$token1");
		$dbpath = x_path("fileUpload","photo-keeper/$token1");
			
		xmload("fileUpload",$path1,"");
		
			}
			
		// Finalizing account update
		
		x_updated("createusers","id='$user'","photo_path = '$dbpath'","<p class='rtext'>Photo updated!</p>","<p class='rtext'>Photo update failed!</p>");
		
		$_SESSION["TIMBOSS_CRYPTBUY_PATH"] = $path1;
		
		?>
		<script>
		setTimeout(function(){
			load('photo-changer');
		},5000);
		</script>
		<?php
		
	}else{
		x_print("<p class='rtext'>Invalid password!</p>");
	}

	
}
?>