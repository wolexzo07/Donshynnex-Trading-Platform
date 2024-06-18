<?php
	
	//get all fiat rate
	
	function sh_fiatrates($currency){
		
		$allowed = ["NGN","GHS","ALL"];
		
		if(in_array($currency , $allowed)){
			
			if($currency == "ALL"){
				
				  if(x_count("rates","status='1' LIMIT 1") > 0){
				
						foreach(x_select("fiat_type,buy_rate,sell_rate","rates","status='1'","3","id") as $key){
							$buyat = $key["buy_rate"];
							$sellat = $key["sell_rate"];
							$fiat = $key["fiat_type"];
							
							$getall[] = $fiat."---".$buyat."---".$sellat;
						}
						
						$response = $getall;
						
					}else{
						
						$response = "No rate set for $currency";
						
					}
				
			}else{
				
					if(x_count("rates","fiat_type='$currency' AND status='1' LIMIT 1") > 0){
				
						foreach(x_select("buy_rate,sell_rate","rates","fiat_type='$currency' AND status='1'","1","id") as $key){
							$buyat = $key["buy_rate"];
							$sellat = $key["sell_rate"];
						}
						
						$response = $currency."---".$buyat."---".$sellat;
						
					}else{
						
						$response = "No rate set for $currency";
						
					}
				
			}
			
	
			
		}else{
			
			$response = "invalid fiat option";
		}
		
		return $response;
		
	}
	
	//re-format crypto
	
	function sh_rates($currency){
		
		$rate = x_crytoindollar($currency);
		
		return "$ ".number_format($rate , 2);
	}
	
	
	// Auto select fiat wallet
	
	function sh_autoFiat($fiat , $userid){
		
		if(isset($fiat)){
			
			if($fiat == "NGN"){
				
				$wid = "naira_wallet";
				
			}elseif($fiat == "GHS"){
				
				$wid = "cedis_wallet";
				
			}elseif($fiat == "KSH"){
				
				$wid = "cephas_wallet";
				
			}elseif($fiat == "USD"){
				
				$wid = "dollar_wallet";
				
			}else{}
			
			if(isset($wid)){
				
				echo "$fiat ".number_format(x_getbalance("$wid",$userid),2);
				
			}else{
				
				echo number_format(0,2);
				
			}
			
		}else{
			
			echo number_format(0,2);
			
		}
	}
	
	// Getting balance in dollar
	
	function sh_getdollarbal($userid , $wallet){
		
		if($wallet == "btc"){
			
			$mw = "btc_wallet";
			$cur = $wallet;
			
		}
		
		if($wallet == "eth"){
			
			$mw = "eth_wallet";
			$cur = $wallet;
			
		}
		
		if($wallet == "usdt"){
			
			$mw = "usdt_wallet";
			$cur = $wallet."@trx";
			
		}
		
		$getbal = x_getbalance("$mw",$userid);
		
		$res = x_crytoindollar("$cur") * $getbal;
		
		return "$ ".number_format($res , 2);
		
	}
	
	// admin access checker

	function sh_adminchecker($uid){
			$getrole  = x_getsingleupdate("createusers","role","id='$uid'");
			return $getrole;		
	}

	// Validating Bitcoin address

	function x_validatebtc($value){
		$regex = "/^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$/";
		$regex1 = "/^\b((bc|tb)(0([ac-hj-np-z02-9]{39}|[ac-hj-np-z02-9]{59})|1[ac-hj-np-z02-9]{8,87})|([13]|[mn2])[a-km-zA-HJ-NP-Z1-9]{25,39})\b$/"; // Bech32 | legacy | Testnet
		if(preg_match($regex,$value) || preg_match($regex1,$value)){
			return true;
		}
			return false;
	}

// Getting single Content from a table using userid

 function x_getcontent($table,$column,$userid){
	 return x_getsingle("SELECT $column FROM $table WHERE id='$userid' LIMIT 1","$table WHERE id='$userid' LIMIT 1",$column);
 }

// Just Balance alone

 function x_getbalance($column,$userid){
	 return x_getsingle("SELECT $column FROM createusers WHERE id='$userid' LIMIT 1","createusers WHERE id='$userid' LIMIT 1",$column);
 }
 
 // Get Current Rates
 
  function x_getrates($column){
	 return x_getsingle("SELECT $column FROM rates WHERE id='1'","rates WHERE id='1'",$column);
 }
 
 // Converting usd to btc 
 function x_usd2btc($usd){
	$json =  xget("https://blockchain.info/tobtc?currency=USD&value=$usd");
	$decode = json_decode($json);
	return $decode;
 }
 
 //Converting BTC to USD with formatting
 function x_btc2usd($btc){
	 $btc = @trim($btc);
	 $json =  xget("https://blockchain.info/ticker");
	 $decode = json_decode($json,true);
	 
	 if(isset($decode["USD"]["last"])){
		 $onebtc = $decode["USD"]["last"];
		 $btc = $onebtc * $btc; 
	 }else{
		 $btc = 0; 
	 }
	 
	 return number_format($btc,2);
	 
 }
 
  //Converting BTC to USD no formatting
 function x_btc2usdnf($btc){
	 $btc = @trim($btc);
	 $json =  xget("https://blockchain.info/ticker");
	 $decode = json_decode($json,true);
	 $onebtc = $decode["USD"]["last"];
	 $btc = $onebtc * $btc;
	 return round($btc,2);
	 
 }
 
 // Getting current Btc price in usd
 
 function x_btcprice($currency,$format){
	$json =  xget("https://blockchain.info/ticker");
	$decode = json_decode($json,true);
	
	if(isset($decode[$currency]["last"])){
		
		if($format == 1){
			
		return strtoupper($currency)." ". number_format($decode[$currency]["last"],2);
		
		}
		return number_format($decode[$currency]["last"],2);
		
	}else{
		return strtoupper($currency)." ". number_format(0,2);
	}
	
 }

?>