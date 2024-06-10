<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user

if(x_validatemethod("POST")){
	
	if(x_count("createusers","status='1' OR status='0' OR status='2' LIMIT 1") > 0){
		
		foreach(x_select("0","createusers","status='1' OR status='0' OR status='2'","500","name") as $key){
			$id = $key["id"];
			$btc = $key["btc_wallet"];
			$naira = $key["naira_wallet"];
			$usd = $key["dollar_wallet"];
			$path = $key["photo_path"];
			$name = $key["name"];
			$mobile = $key["mobile"];
			$email = $key["email"];
			$role = $key["role"];
			$status = $key["status"];
			?>
			<ul class="list-group mt-3 mb-3">
				<li class="list-group-item strip"><img src="<?php
				if($path == ""){
					echo "img/avatar.png";
				}else{
					if(file_exists($path)){
						echo $path;
					}else{
						echo "img/avatar.png";
					}
				}
				?>" class="userprofileR"/>
				<?php
				if($role == "1"){
					?>
					<span style="background-color:green;color:white;" class="pull-right badge">Admin</span></li>
					<?php
				}else{
					
					if($status == "0"){
						?>
					<span style="background-color:green;color:white;" class="pull-right badge">Inactive</span></li>
					<?php
					}elseif($status == "1"){
						?>
					<span style="background-color:green;color:white;" class="pull-right badge">Active</span></li>
					<?php
					}elseif($status == "2"){
						?>
					<span style="background-color:green;color:white;" class="pull-right badge">Suspended</span></li>
					<?php
					}else{
						
					}
					
				}
				?>
				
				
				<li class="list-group-item">
				<?php echo $name;?></li>
				<li class="list-group-item strip">
				<?php echo $btc." BTC";?></li>
				<li class="list-group-item">
				<?php echo "NGN ".number_format($naira,2);?></li>
					<li class="list-group-item strip">
				<?php echo $email;?></li>
				<li class="list-group-item">
				<?php echo $mobile;?></li>
				
			</ul>
			<?php
		}
		
	}else{
		x_print("<ul class='list-group'><li class='list-group-item'><p class='text-center'><i style='color:lightgray;font-size:50pt;' class='fa fa-trash mt-2'></i><br/><br/>No registered user<p></li></ul>");
	}
	
}
?>
<style>
.strip{background-color:aqua;
color:black;
font-weight:none;}
</style>