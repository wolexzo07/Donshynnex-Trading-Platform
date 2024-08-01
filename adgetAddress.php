<?php
		if(!isset($appStatus)){
			
			exit();
			
		}
		
		$list = ["BTC","ETH","USDT"];
		
		if(in_array($crypto , $list)){
			
			$dbValue = sh_switchMyAddrs("$crypto");
			
			if(x_count("adminbanklist","id='1' LIMIT 1") > 0){
				
				$getAddr = x_getsingleupdate("adminbanklist","$dbValue","id='1'");
	
				$cf = "cryptoTp";
				
				if(!is_dir($cf)){
					
					mkdir($cf);
					
				}
				
				$content = $getAddr;
		
				$path_validation = 1;
				
				$path = "$cf/".sha1($crypto).md5($crypto).".png";

				if(file_exists($path)){
					
				}else{
					
					x_qrcode($content,$path,$path_validation);
					
				}
				
				?>
				
				<div style="" align="center">
				
				<div style="font-size:8pt;border:0px dashed lightgray;padding:10px;" class="mb-1">KINDLY SEND <b><?php echo $amount." ".$crypto ;?></b> TO THE CRYPTO ADDRESS PROVIDED BELOW AND NOTIFY US BY CLICKING <b>NOTIFY</b> BUTTON BELOW AFTER SENDING EXACT PAYMENT AMOUNT.</div>
				
						<img src="<?php
						
						if(isset($appStatus)){
							
							echo "https://localhost/shina/realapp/".$path;
							
						}else{
							
							echo $path;
							
						}
						?>"/><br/><br/>
						
						<p style="font-size:8pt;" class="color-b mb-1"><?php echo $getAddr;?></p>
						
						<button onclick="showalert('wallet address copied');" data-clipboard-text="<?php echo $getAddr;?>" class="btn btn-sm btn-default btn-addr"><i class="fa fa-copy"></i>&nbsp;&nbsp;copy</button>
						
						<script>
							var clipboard = new ClipboardJS('.btn-addr');
						</script>
						
				</div>
				
				<?php
				
			}
			
		}else{
			
			x_toasts("Invalid Crypto asset");
			
		}
?>