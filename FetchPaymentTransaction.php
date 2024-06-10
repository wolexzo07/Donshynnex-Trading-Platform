<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user

if(x_validatemethod("POST")){
	
	if(x_count("transaction","wallet_type='ngn' AND type='topup' AND topup_type='offline' OR wallet_type='ngn' AND type='topup' AND topup_type='online' LIMIT 1") > 0){
		?>
	
		<?php
		foreach(x_select("0","transaction","wallet_type='ngn' AND type='topup' AND topup_type='offline' OR wallet_type='ngn' AND type='topup' AND topup_type='online'","500","id desc") as $key){
			$id = $key["id"];
			$tid = $key["tranx_id"];
			$uid = $key["user_id"];
			$wallet_type = $key["wallet_type"];
			$type = $key["type"];
			$toptype = $key["topup_type"];
			$amount = $key["amount"];
			$wba = $key["wallet_balance_after"];
			$status = $key["status"];
			$dt = $key["date_time"];
			$token = $key["token"];
			
			// Getting user details
			$name = x_getsingle("SELECT name FROM createusers WHERE id='$uid' LIMIT 1","createusers WHERE id='$uid' LIMIT 1","name");
			
			$ngn_wallet = x_getsingle("SELECT naira_wallet FROM createusers WHERE id='$uid' LIMIT 1","createusers WHERE id='$uid' LIMIT 1","naira_wallet");
			
			$path = x_getsingle("SELECT photo_path FROM createusers WHERE id='$uid' LIMIT 1","createusers WHERE id='$uid' LIMIT 1","photo_path");
			
			$email = x_getsingle("SELECT email FROM createusers WHERE id='$uid' LIMIT 1","createusers WHERE id='$uid' LIMIT 1","email");
			
			$mobile = x_getsingle("SELECT mobile FROM createusers WHERE id='$uid' LIMIT 1","createusers WHERE id='$uid' LIMIT 1","mobile");
			
			
			?>
			<ul class="list-group mt-3 mb-3">
			
				<li class="list-group-item strip">
				
				<img src="<?php
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
				<span style="background:white;color:black;border:1px solid gray;" class="badge"><?php echo $toptype;?></span>
				<?php
					if($status == "0"){
						?>
					<span style="background-color:green;color:white;" class="pull-right badge">Pending</span>
					<?php
					}elseif($status == "1"){
						?>
					<span style="background-color:green;color:white;" class="pull-right badge">Approved</span>
					<?php
					}elseif($status == "2"){
						?>
					<span style="background-color:green;color:white;" class="pull-right badge">Cancelled</span>
					<?php
					}else{
						
					}
				?></li>
				
				<li class="list-group-item pb-2">
				<font style='font-weight:none;'><?php echo $name;?></font> Paid <b><?php echo "NGN ".number_format($amount,2);?></b> on <?php echo $dt;?> 
				<?php
				if($status == "0"){
					?>
					<br/><br/>
					  <span id="appr<?php echo $id;?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-check-circle"></i> Approve</span>
					  
					  <span id="canc<?php echo $id;?>" type="button" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Cancel</span>	
						
					<script>
					$(document).ready(function(e){
			function FetchPostContent(resultid,processingScript,switchdisplay){
			if(switchdisplay == "1"){
				$("#"+resultid).show();
				$("#"+resultid+"1").show();
				$("#"+resultid+"1").fadeIn(400).html("<img class='img-circle' src='img/ajax-loader.gif'/> wait....");
			}
					 var dataString = "";
					 $.ajax({
						   type: "GET",
						   url: processingScript,
						   data: dataString,
						   cache: false,
						   success: function(result){
							$("#"+resultid).html(result);
							$("#"+resultid+"1").hide();
							$("#appr<?php echo $id;?>").hide();
							$("#canc<?php echo $id;?>").hide();
							setTimeout(function(){
								$("#"+resultid).hide();
							},10000);
						   }
					  });
				}
				
						$("#appr<?php echo $id;?>").click(function(){
							FetchPostContent("restnow<?php echo $id;?>","Process_Approved?token=<?php echo $token;?>&tid=<?php echo $id;?>","1");
						});
						$("#canc<?php echo $id;?>").click(function(){
							FetchPostContent("restnow<?php echo $id;?>","Process_Cancelled?token=<?php echo $token;?>&tid=<?php echo $id;?>","1");
						});
					});
					</script>
					
				
					<p style="color:green;padding-top:5px;" id="restnow<?php echo $id;?>1"></p>
					<p style="color:green;padding-top:5px;" id="restnow<?php echo $id;?>"></p>
					
					<?php
				}
				?>
						
				</li>
				<li style="font-size:9pt;display:none;" class="list-group-item strip"><?php echo $tid;?></li>
				
				<!--<li class="list-group-item strip">
				</li>
				<li class="list-group-item"></li>-->
				
				
				<li style="display:none;" class="list-group-item strip">
				<b><?php echo "NGN ".number_format($ngn_wallet,2);?></b> (Current Balance)</li>
				
				
			</ul>
			<?php
		}
		
	}else{
		x_print("<ul class='list-group'><li class='list-group-item'><p class='text-center'><i style='color:lightgray;font-size:50pt;' class='fa fa-credit-card mt-2'></i><br/><br/>No payments found<p></li></ul>");
	}
	
}
?>
<style>
.strip{background-color:white;
color:black;
font-weight:none;}
</style>