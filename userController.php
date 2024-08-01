<?php
	
	if(!isset($ptoken)){
		
		exit();
		
	}
	
	
	if($cmd == "app-login"){
		
		include("appLoginpro.php");
	
	}

	if($cmd == "app-register"){
		
		include("appRegisterPro.php");
	
	}

	if($cmd == "app-reset"){
		
		//include("appRegisterPro.php");
	
	}

	if($cmd == "crypto-rates"){
		
		include("cryptoRates.php");
	
	}

	if($cmd == "fiat-rates"){
		
		?>
			<style>
				.crypt-img {width: 30px;}
			</style>
		<?php
		
		include("fiatRates.php");
	
	}

	if($cmd == "wallet-base"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		include_once("cryptoPortfolio.php");

		include_once("fiatPortfolio.php");
	
	}


	if($cmd == "funding-account"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		$appStatus = "ok"; $appContinua = $hasher;
		
		
		include("top-up.php");
		
	}

	if($cmd == "buying-asset"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		include("buy-btc.php");
		
		?>
		<script>
			$(document).ready(function(){
				formProcessor("#buybtcnow","#response-one","app-buys","<?php echo $hasher;?>");
			});
		</script>
		<?php
	}

	if($cmd == "selling-asset"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		include("sell-btc.php");
		
		?>
		<script>
			$(document).ready(function(){
				formProcessor("#sellbtcnow","#response-two","app-sells","<?php echo $hasher;?>");
			});
		</script>
		<?php
		
	}


	if($cmd == "app-topUps"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		
	}

	if($cmd == "app-buys"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		include("proBuy.php");
		
	}


	if($cmd == "app-sells"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		$appStatus = "ok"; $appContinua = $hasher;
		
		include("proSells.php");
	}
	
	
	if($cmd == "external-sales"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		$appStatus = "ok";
		
		//x_toasts("Data captured for external $hasher!");
		
		include("proExternal.php");
	}

	if($cmd == "generate-crypto-account"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $userid = $split[0];
		
		$appStatus = "ok"; $crypto = $split[4]; $amount = $split[5];
		
		include("adgetAddress.php");
		
	}

	if($cmd == "convert_crypto_usd"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $asset = $split[0]; $amount = $split[1];
		
		$appStatus = "ok"; 
		
		$rate = sh_getRatenCon($asset , $amount , "1");
		
		//echo "$ ".number_format($rate,2);
		echo number_format($rate,2);
		
	}

	if($cmd == "convert_usd_crypto"){
		
		$hasher = xg("hasher"); $split = explode("-",$hasher); $asset = strtolower($split[0]); $amount = $split[1];
		
		$appStatus = "ok"; 
		
		if($asset == "usdt"){
			
			$asset = "usdt@trx";
			
		}
		
		$rate = x_crytoindollar("$asset");
		
		if($asset == "usdt@trx"){
			
			$final = round($amount / $rate,2);
			
		}else{
			
			$final = round($amount / $rate,4);

		}
		
		echo $final;
		
	}

?>