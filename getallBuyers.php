<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user

if(x_validatemethod("POST")){
	
	if(x_count("btransactions","status = '1' OR status='0'") > 0){
		
		$counter = 0;
		
		?>
		
		<div class="response-trx"></div>
		
		<table class="table" id="table_id">
				<thead>
					<tr>
						<th>No.</th>
						<th>User Details</th>
						<th>Crypto Balance</th>
						<th>Fiat Balance</th>
						<th>Tranx Type</th>
						<th>Tranx. ID</th>
						<th>Fiat Rate / $</th>
						<th>Crypto amount</th>
					</tr>
				</thead>
			<tbody>
		<?php
		foreach(x_select("0","btransactions","status = '1' OR status='0'","5000","id desc") as $key){
			
			$counter++;
			
			$id = $key["id"]; $tid = $key["tranx_id"]; $uid = $key["user_id"]; $ttype = $key["tranx_type"];
			
			$wused = $key["wallet_used"]; $cused = $key["crypto_used"];

			$rate = $key["rate_used"]; 
			
			$amtinc = $key["amount_in_crypto"];
			
			$amtinusd = $key["amount_in_usd"];  $amtincur = $key["amount_in_currency"];

			$status = $key["status"]; $dt = $key["date_time"];
			
			// Getting user details
			
			$walletType = fiatSwitches($wused);

			foreach(x_select("mobile,email,name,photo_path,$walletType","createusers","id='$uid'","1","id") as $data){
			
				$name = $data["name"]; $wallet = $data["$walletType"]; $path = $data["photo_path"]; $email = $data["email"];
				
				$mobile = $data["mobile"];
			
			}
		
			?>
			
				<tr>
				<td><?php echo $counter;?></td>
				
				<td><img src="<?php echo x_validatepath($path , 'img/avatar.png');?>" class="img-icon d-none"/>
				
				<p class="color-b"><?php echo $name;?><br/><?php echo $email;?><br/><?php echo $mobile;?></p>
				</td>
				
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
				
				<td><span class="badge bg-gr color-w"><?php echo $ttype;?></span></td>
				
				<td class="">
					<span title="<?php echo $tid;?>"><?php echo substr($tid,0,8)."***".substr($tid,-8);?></span>
				</td>

				<td class=""><?php echo $wused." ".$rate." / $";?></td>
				
				<td>
				
				<span class="f-bold"><?php echo $wused." ".number_format($amtincur,2);?> - 
				<?php echo $amtinc." ".$cused;?></span><br/>
				<?php echo "[~ $ ".number_format($amtinusd,2)."]";?>
				
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