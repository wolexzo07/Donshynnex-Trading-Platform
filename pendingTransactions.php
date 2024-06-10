<?php 
// Fetching pending transactions
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatesession("TIMBOSS_CRYPTBUY_ID")){
	
	$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
	
	if(x_count("transaction","status='0' AND user_id='$userid' LIMIT 1") > 0){
		?><p class="labelme">All pending transactions</p><ul style="font-size:9pt;" class="list-group"><?php
		foreach(x_select("id,amount,tranx_id,wallet_type,type,date_time,time_stamp","transaction","status='0' AND user_id='$userid'","10","id desc") as $details){
		
		$id = $details["id"];
		$amt = $details["amount"];
		$tranx_id = $details["tranx_id"];
		$wallet_type = $details["wallet_type"];
		$type = $details["type"];
		$time = $details["date_time"];
		$ago = $details["time_stamp"];
		
		$fmin_naira = "<b>NGN ".number_format($amt,2)."</b>";
		$fmin_btc = "<b>".number_format($amt,8)." BTC</b>";
		
		//type = topup || withdraw || buybtc || sellbtc-internal || sellbtc-external 
		
			// Validating Transaction cases
			
			if(($type == "topup") && ($wallet_type == "ngn")){
				?>
				<li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-down"></i>&nbsp;&nbsp; <?php echo $fmin_naira;?> was added to wallet! <!---<span class="pull-right badge" style="background:lightgray;color:white;"> 1 min</span>---></li>
				<?php
			}elseif(($type == "withdraw") && ($wallet_type == "ngn")){
				?>
				<li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;&nbsp; <?php echo $fmin_naira;?> was paid to your Bank! <!---<span class="pull-right badge" style="background:lightgray;color:white;"> 1 min</span>---></li>
				<?php
			}elseif(($type == "buybtc") && ($wallet_type == "btc")){
				?>
				<li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-down"></i>&nbsp;&nbsp; <?php echo $fmin_btc;?> was added to wallet! <!---<span class="pull-right badge" style="background:lightgray;color:white;"> 1 min</span>---></li>
				<?php
			}elseif(($type == "sellbtc-internal") && ($wallet_type == "btc")){
				?>
				<li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;&nbsp; <?php echo $fmin_btc;?> was sold from wallet! <!---<span class="pull-right badge" style="background:lightgray;color:white;"> 1 min</span>---></li>
				<?php
			}elseif(($type == "sellbtc-external") && ($wallet_type == "btc")){
				?>
				<li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;&nbsp; <?php echo $fmin_btc;?> was sold from wallet! <!---<span class="pull-right badge" style="background:lightgray;color:white;"> 1 min</span>---></li>
				<?php
			}else{
				// No more condition to set
			}
		
		}
		?></ul><?php
	}else{
		x_print("<ul class='list-group'><li class='list-group-item'><p class='text-center'><i style='color:lightgray;font-size:50pt;' class='fa fa-briefcase mt-2'></i><br/><br/>No pending Transaction<p></li></ul>");
	}
}
?>