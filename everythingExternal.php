<?php

		if(!isset($wallet)){
			
			exit();
			
		}

		// Getting company crypto details from
		
		if($cwallet == "BTC"){
			
			$addr = "btc_addr";
			
		}
		
		if($cwallet == "ETH"){
			
			$addr = "eth_addr";
			
		}
		
		if($cwallet == "USDT"){
			
			$addr = "usdt_addr";
			
		}
		
		$getaddr = x_getsingleupdate("adminbanklist","$addr","crypto_status='1' AND id='1'");
		
		$content = strtolower($cwallet).":$getaddr?amount=$amtinbtc&amp;label=Payment";
		
		$path_validation = 1;
		
		$path = "qrcoder/".sha1($tranx_id).".png";

		if(file_exists($path)){
			
		}else{
			
			x_qrcode($content,$path,$path_validation);
			
		}
		

?>

<div style="overflow:hidden;border-bottom:1px dashed lightgray;padding-bottom:20pt;">
	
	
		<p style="font-size:8pt;" class="mb-2 color-b">Send exactly <b><?php echo $amtinbtc." ".$cwallet;?></b> to the <b><?php echo $cwallet;?></b> address provided below and click on <b>"I have sent"</b> button once you are done:</p>
		
		<div align="center">
		
			<img src="<?php
			if(isset($appStatus)){
				
				echo "https://localhost/shina/realapp/".$path;
				
			}else{
				
				echo $path;
				
			}
			?>"/><br/><br/>
			
			<p style="font-size:8pt;" class="color-b mb-1"><?php echo $getaddr;?></p>
			
			<button onclick="showalert('wallet address copied');" data-clipboard-text="<?php echo $getaddr;?>" class="btn btn-sm btn-default btn-addr mb-2"><i class="fa fa-copy"></i>&nbsp;&nbsp;copy</button>
			
				<script>
					var clipboard = new ClipboardJS('.btn-addr');
				</script>
		</div>

	
	<form id="confirmBTC">
	
		<p class="textStyler">Upload screenshot:</p>
		
		<div class="form-group mt-1">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cloud-upload"></i></span>
				<input type="file" style="height:45px;padding-top:10px;" autocomplete="off" accept=".jpeg,.png,.jpg" name="upload[]" id="upload" class="form-control" />
			</div>
		</div>
		
		<p class="textStyler">Sender <?php echo $cwallet;?> Address:</p>
		
		<div class="form-group mt-1">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
				<input type="text" style="height:45px;" autocomplete="off" name="sender_addr" id="sender_addr" class="form-control" placeholder="Sender <?php echo $cwallet;?> wallet Address" />
			</div>
		</div>
		
		<input type="hidden" name="etoken" value="<?php echo $token;?>"/>
		<input type="hidden" name="tranx_id" value="<?php echo $tranx_id;?>"/>
		<input type="hidden" name="wallet" value="<?php echo $wallet;?>"/>
		<input type="hidden" name="cwallet" value="<?php echo $cwallet;?>" />
		<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
		<input type="hidden" name="amtinbtc" value="<?php echo $amtinbtc;?>"/>
		<input type="hidden" name="amtinnaira" value="<?php echo $amtinnaira;?>"/>
		<input type="hidden" name="amtinusd" value="<?php echo $amtinusd;?>"/>
		<input type="hidden" name="addr_used" value="<?php echo $getaddr;?>"/>
		<input type="hidden" name="payout" value="<?php echo $payout;?>"/>
		
		<button class="btn btn-primary">I have sent</button>
		
		<input type="reset" value="reset" style="display:none;" class="reset-external"/>
		
	</form>
	
	<div id="response-cr" class="mt-2"></div>
	
</div>


<script>
	$(document).ready(function(){
		<?php
			if(isset($appStatus)){
				?>
				formProcessor("#confirmBTC","#response-cr","external-sales","<?php echo $appContinua;?>");
				<?php
			}else{
				?>
				processAjaxForm("confirmBTC","response-cr","processBtcExternal","0"); // Process external Selling
				<?php
			}
		?>
	});
</script>

<?php
if(!isset($appStatus)){
	?>
	<script src="extra.js"></script>
	<?php
}
?>


