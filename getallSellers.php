<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user

if(x_validatemethod("POST")){
	
	if(x_count("stransactions","transfer_money_status = '0'") > 0){
		
		$counter = 0;
		
		?>
		
		<div class="response-trx"></div>
		
		<table class="table" id="table_id">
				<thead>
					<tr>
						<th>No.</th>
						<th>User Details</th>
						<th>Tr.Type</th>
						<th>Timestamp</th>
						<th>Crypto Amount</th>
						<th>Action / Remarks</th>
						
					</tr>
					
				</thead>
			<tbody>
		<?php
		foreach(x_select("0","stransactions","transfer_money_status = '0'","5000","id desc") as $key){
			
			$counter++;
			
			$id = $key["id"]; $tid = $key["tranx_id"]; $uid = $key["user_id"]; $wtype = $key["wallet_type"];
			
			$crypto = $key["crypto_in_use"]; $ctype = $key["conversion_type"]; 
			
			$is_proof = $key["is_receipt_upload"];
			
			$payout = $key["payout"]; $rate = $key["rate_used"]; 
			
			$amtc = $key["amount_in_crypto"]; $amtinusd = $key["amount_in_usd"]; $amtincur = $key["amount_in_currency"];
			
			$sender = $key["sender_crypto_address"]; $caddr = $key["company_crypto_address"];
			
			$r_status = $key["recieved_status"]; $m_status = $key["transfer_money_status"];
			
			$timer = $key["date_time"];
			
			// Getting user details
			
			$walletType = fiatSwitches($payout);

			foreach(x_select("mobile,email,name,photo_path,$walletType","createusers","id='$uid'","1","id") as $data){
			
				$name = $data["name"]; $wallet = $data["$walletType"]; $path = $data["photo_path"]; $email = $data["email"];
				
				$mobile = $data["mobile"];
			
			}
		
			?>
			
				<tr>
				
				<td><?php echo $counter;?></td>
				
				<td><!--<img src="<?php //echo x_validatepath($path , 'img/avatar.png');?>" class="img-icon d-none"/>--> &nbsp;<?php echo $name;?>
				
				<p style="font-size:10pt;" class="color-b mt-0">
				
					<?php echo $email;?><br/>
					<?php echo $mobile;?>
				
				</p>
				
				</td>
				
			
				
				<td>
				<span class="badge color-w bg-g"><?php echo $ctype;?></span><br/>
				<span class="badge color-w bg-p"><?php echo $wtype;?></span></td>
				
			
				<td><?php echo $timer;?></td>
				


				<td><b><?php echo $amtc." $crypto"?></b></td>
				<td>
				<?php
				
					if($r_status == "0"){
						
						?>
						
						  <span onclick='x_fetchpro(".response-trx","confirm-coin","<?php echo $tid.'-'.$id;?>")' type="button" class="btn btn-sm btn-primary"><i class="fa fa-check-circle"></i> Confirm</span>
						
						<?php
					}

					if($m_status == "0"){
						
						?>
						
						  <span onclick='x_fetchpro(".response-trx","mark-paid","<?php echo $tid.'-'.$id;?>")' type="button" class="btn btn-sm btn-warning"><i class="fa fa-money"></i> Pay</span>
						
						<?php
					}


					if($m_status == "0" && $r_status == "0"){
						
						?>
						
						  <span onclick='x_fetchpro(".response-trx","cancel-coin","<?php echo $tid.'-'.$id;?>")' type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Cancel</span>
						
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