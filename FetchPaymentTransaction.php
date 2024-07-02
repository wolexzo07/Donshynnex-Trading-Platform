<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user

if(x_validatemethod("POST")){
	
	if(x_count("transaction","status = '0'") > 0){
		
		$counter = 0;
		
		?>
		
		<div class="response-trx"></div>
		
		<table class="table" id="table_id">
				<thead>
					<tr>
						<th>No.</th>
						<th>Photo/Name</th>
						<th>Crypto Balance</th>
						<th>Fiat Balance</th>
						<th>Contact Details</th>
						<th>Topup amount</th>
						
						<th>Action</th>
					</tr>
				</thead>
			<tbody>
		<?php
		foreach(x_select("0","transaction","status = '0'","500","id desc") as $key){
			
			$counter++;
			
			$id = $key["id"]; $tid = $key["tranx_id"]; $uid = $key["user_id"]; $wallet_type = $key["wallet_type"];
			
			$type = $key["type"]; $toptype = $key["topup_type"]; $amount = $key["amount"];$wba = $key["wallet_balance_after"];
			
			$wbf = $key["balance_before"]; $status = $key["status"]; $dt = $key["date_time"]; $token = $key["token"];
			
			// Getting user details
			
			$walletType = fiatSwitches($wallet_type);

			foreach(x_select("mobile,email,name,photo_path,$walletType","createusers","id='$uid'","1","id") as $data){
			
				$name = $data["name"]; $wallet = $data["$walletType"]; $path = $data["photo_path"]; $email = $data["email"];
				
				$mobile = $data["mobile"];
			
			}
		
			?>
			
				<tr>
				<td><?php echo $counter;?></td>
				
				<td><img src="<?php echo x_validatepath($path , 'img/avatar.png');?>" class="img-icon"/> &nbsp;<?php echo $name;?></td>
				
				<td>
					<?php
					
						$listCurrency = ["btc_wallet","usdt_wallet","eth_wallet"];
						
						foreach($listCurrency as $ftm){
							$split = explode("_",$ftm);
							$sy = strtoupper($split[0]);
							echo number_format(x_getbalance($ftm , $uid),5)." $sy"."<br/>";	
						}
					?>
				</td>

				<td>
					<?php
					
						$listCurrency = ["NGN","GHS","KSH"];
						
						foreach($listCurrency as $ftm){
							
							echo $ftm." ".number_format(sh_getFiatBalancebyUid($ftm , $uid),2)."<br/>";
							
						}
					?>
				</td>
				
				<td><?php echo $email;?><br/><?php echo $mobile;?></td>

				<td><b><?php echo $wallet_type ." ".number_format($amount,2);?></b>
				
					<br/>
					<span style="background:white;color:black;border:1px solid gray;font-size:6pt;" class="badge"><?php echo $toptype;?></span>
					
					<span style="background-color:green;color:white;font-size:6pt;" class="badge">	<?php echo statusSwch($status);?></span>
				
				</td>
				<td>
				<?php
				
					if($status == "0"){
						
						?>
						  <span onclick='x_fetchpro(".response-trx","appr-ptranx","<?php echo $tid.'-'.$token;?>")' type="button" class="btn btn-sm btn-default"><i class="fa fa-check-circle"></i> Approve</span>
						  
						  <span onclick='x_fetchpro(".response-trx","cancel-ptranx","<?php echo $tid.'-'.$token;?>")' type="button" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Cancel</span>
						
						<?php
					}
				
				?>
				</td>
			</tr>
			
			<?php
		}
		
		?>
		
		</tbody></table>
		
		
		
		<?php
		
	}else{
		x_print("<ul class='list-group'><li class='list-group-item'><p class='text-center'><i style='color:lightgray;font-size:50pt;' class='fa fa-credit-card mt-2'></i><br/><br/>No payments found<p></li></ul>");
	}
	
}
?>
<style>
.strip{background-color:white;color:black;font-weight:none;}
.img-icon {width:30px;border-radius:500px;}
</style>

<script>
	$(document).ready( function () {
		$('#table_id').DataTable({
			lengthMenu: [
				[10, 25, 50, 100, -1],
				[10, 25, 50, 100, 'All'],
			],
		});
		$("#table_id_filter input").attr("placeholder","Search Anything");
		$("#table_id_filter input").attr("class","form-control form-control-sm");
	});
</script>