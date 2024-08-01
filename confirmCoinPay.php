<?php 

	if(isset($hasher)){
		
		$split = explode("-",$hasher);
		
		$tid = $split[0]; $id = $split[1];
		
		
		if(x_count("stransactions","id='$id' AND tranx_id='$tid' LIMIT 1") > 0){
			
			foreach(x_select("0","stransactions","id='$id' AND tranx_id='$tid'","1","id desc") as $key){
			
			//$counter++;
			
			$id = $key["id"]; $tid = $key["tranx_id"]; $uid = $key["user_id"]; $wtype = $key["wallet_type"];
			
			$crypto = $key["crypto_in_use"]; $ctype = $key["conversion_type"]; 
			
			$is_proof = $key["is_receipt_upload"];
			
			$payout = $key["payout"]; $rate = $key["rate_used"]; 
			
			$amtc = $key["amount_in_crypto"]; $amtinusd = $key["amount_in_usd"]; $amtincur = $key["amount_in_currency"];
			
			$sender = $key["sender_crypto_address"]; $caddr = $key["company_crypto_address"];
			
			$r_status = $key["recieved_status"]; $m_status = $key["transfer_money_status"];
			
				$timed = $key["date_time"];
				
			}
			
			$inusd = sh_getRatenCon($crypto , $amtc , "1");
			
			$infiat = $inusd * $rate ;
			
			$timer = x_curtime(0,1);
			
			
			if(x_count("stransactions","id='$id' AND tranx_id='$tid' AND transfer_money_status='1' LIMIT 1") > 0){
				
				x_toasts("Transaction was completed before!");
				
				exit();
				
			}
			
			
			if(x_count("stransactions","id='$id' AND tranx_id='$tid' AND recieved_status='1' LIMIT 1") > 0){
				
				x_toasts("Duplicate confirmation not allowed!");
				
			}else{
				
				x_updated("stransactions","id='$id' AND tranx_id='$tid'","recieved_status='1',coinconfirmed_at='$timer'","<script>showalert('Coin confirmed successfully!');</script>","<script>showalert('Failed to confirm.');</script>");
				
			}

			?>
			<div class="raise_it">
				
				<div class="container">
				
					<div class="row">
					
						<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"></div>
						<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
							<table class="table table-striped">
								<caption class="p-1" style="border:1px solid lightgray;"><i class="fa fa-window-close close-uni"></i> &nbsp;Transaction Details</caption>
								
								<tr>
									<td width="50%">Tranx. ID</td>
									<th><?php echo $tid;?></th>
								</tr>
								
								<tr>
									<td>Crypto Amount</td>
									<th><?php echo $amtc." $crypto";?></th>
								</tr>
								
								<tr>
									<td>Crypto Rate</td>
									<th>1 &nbsp;<?php echo $crypto;?> = <?php 
									
									if($crypto == "USDT"){
										
										$sh = "usdt@trx";
										
									}else{
										
										$sh = strtolower($crypto);
									}
									
									echo sh_rates($sh);
									
									?></th>
								</tr>
								
								<tr>
									<td>Rate used</td>
									<th><?php echo $payout." ".$rate. " / $";?></th>
								</tr>
								
								<tr>
									<td>Crypto in USD</td>
									<th><?php echo "$ ".number_format($inusd,2);?></th>
								</tr>
								
								<tr>
									<td>Crypto in <?php echo $payout;?></td>
									<th class="color-g"><?php echo $payout." ".number_format($infiat,2);?> (PAYOUT AMOUNT)</th>
								</tr>
								
							</table>
							
							<?php
								if(x_count("createusers","id='$uid' LIMIT 1") > 0){
									
									foreach(x_select("bank_name,acct_number,acct_name,momo_acctname,momo_acctnumb,momo_id,ksh_acctname,ksh_acctnum,ksh_bankname","createusers","id='$uid'","1","id") as $key){
										
										$bn = $key["bank_name"]; // NGN
										$acn = $key["acct_number"]; $acnam = $key["acct_name"];
										
										$macn = $key["momo_acctname"]; // GHS
										$mnumb = $key["momo_acctnumb"]; $mid = $key["momo_id"];
										
										
										$knam = $key["ksh_acctname"]; //KSH
										$kacn = $key["ksh_acctnum"]; $kbn = $key["ksh_bankname"];
										
									}
									
								}else{
									
										$bn = ""; $acn = ""; $acnam = "";
										
										$macn = ""; $mnumb = "";$mid = "";
										
										$knam = ""; $kacn = ""; $kbn = "";
								}
							?>
							
							
							<table class="table table-striped mt-3">
								<caption class="p-1" style="border:1px solid lightgray;"><i class="fa fa-window-close close-uni"></i> &nbsp;Banking Details</caption>
								
								<?php
								
									if($payout == "NGN"){
										?>
										<tr>
											<td width="50%">Bank name</td>
											<th><?php echo $bn;?></th>
										</tr>
										
										<tr>
											<td>Account Name</td>
											<th><?php echo $acnam;?></th>
										</tr>
										
										<tr>
											<td>Account Number</td>
											<th><?php echo $acn;?></th>
										</tr>
										<?php
									}
									
									if($payout == "GHS"){
										?>
										
										<tr>
											<td>Momo Number</td>
											<th><?php echo $mnumb;?></th>
										</tr>
										
										<tr>
											<td>Momo id</td>
											<th><?php echo $mid;?></th>
										</tr>
										<?php
									}
									
									if($payout == "KSH"){
										?>
										<tr>
											<td>Bank name</td>
											<th><?php echo $kbn;?></th>
										</tr>
										
										<tr>
											<td>Account Name</td>
											<th><?php echo $knam;?></th>
										</tr>
										
										<tr>
											<td>Account Number</td>
											<th><?php echo $kacn;?></th>
										</tr>
										<?php
									}
								
								?>
							</table>
							
							<?php
							
								if($is_proof == "1"){
									?>
									<div class="p-1" style="border:1px solid lightgray;"><i class="fa fa-window-close close-uni"></i> &nbsp;Transaction Proof</div>
							
									<div class="stick-img">
									
										<?php
											if(x_count("filelogs","post_id = '$tid' LIMIT 1") > 0){
												
												foreach(x_select("file_path","filelogs","post_id = '$tid'","1","id") as $path){$path = $path["file_path"];}
												
											}else{$path = "";}
											
										?>
									<img src="<?php echo x_validatepath($path , 'img/avatar.png');?>" style="max-width:100%;" alt="Missing"/>
									
									</div>
									
									<?php
								}
							
							?>
							
							
							
						</div>
						<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"></div>
					
					</div>
					
				</div>
				
			</div>
			<?php
			
		}else{
			
			x_toasts("Invalid transaction detected");
			
		}
		
	}else{
		
		x_toasts("missing parameter");
		
	}

?>

<style>
	.raise_it{
		position:fixed;
		top:0pt;
		bottom:;
		right:;
		left:0pt;
		background:white;
		height:100%;
		width:100%;
		z-index:5000;
		opacity:1;
		padding-top:20px;
		padding-bottom:10px;
		overflow:auto;
	}
	.stick-img {
		
		height:300px;
		overflow:auto;
		padding-bottom:20px;
		padding-top:20px;
		
	}
</style>

<script>
	$(document).ready(function(){
		
		$(".close-uni").click(function(){
			
			$(".raise_it").hide(300);
			
		});
		
	});
</script>