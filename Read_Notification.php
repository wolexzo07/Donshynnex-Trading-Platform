<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");

if(x_validatemethod("POST")){
	$uid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
	
	if(x_count("notification","user_id='$uid'") > 0){
		foreach(x_select("id,title,message,date_time,status","notification","user_id='$uid'","50","id desc") as $key){
			$id = $key["id"];
			$title = $key["title"];
			$msg = $key["message"];
			$date = $key["date_time"];
			$status = $key["status"];
			
			x_update("notification","id='$id'","status='1'","&nbsp;","Failed");
			
			?>
		<ul class="list-group mt-2">
			<li class="list-group-item"><?php echo $title;?></li>
			<li class="list-group-item"><?php echo $msg;?></li>
			<li class="list-group-item"><?php echo $date;?>
			<span style='font-size:7pt;color:black;background:white;border:1px solid black;' class="badge pull-right"><?php if($status == "1"){echo "<i class='fa fa-check'></i><i class='fa fa-check'></i>";}else{echo "<i class='fa fa-check'></i>";}?></span>
			</li>
			<?php
		}
		?></ul><?php
	}else{
		x_print("<ul class='list-group mt-2'>
			<li class='list-group-item'><center><br/><br/><i class='fa fa-bell' style='font-size:45pt;color:lightgray;'></i><br/><br/>No Messages!<br/><br/></center></li></ul>");
	}
	
}
?>
<style>
p{color:black;}
li{
	font-size:9pt;
}
</style>