<?php 

	if(isset($hasher)){
		
		$split = explode("-",$hasher);
		
		$tid = $split[0]; $id = $split[1];
		
		
		if(x_count("stransactions","id='$id' AND tranx_id='$tid' LIMIT 1") > 0){
			
			foreach(x_select("user_id ,recieved_status , transfer_money_status , wallet_type , crypto_in_use , amount_in_crypto","stransactions","id='$id' AND tranx_id='$tid'","1","id desc") as $key){
				
			$r_status = $key["recieved_status"]; 
			
			$m_status = $key["transfer_money_status"];
			
			$wt = $key["wallet_type"];
			
			$coin = $key["crypto_in_use"];
			
			$camount = $key["amount_in_crypto"];
			
			$uid = $key["user_id"];
			
			}
			
			if($r_status == "0" && $m_status == "0"){
				
				// checking for proof of transaction file for deletion
				
				if(x_count("filelogs","post_id='$tid' LIMIT 1") > 0){
					
					foreach(x_select("file_path","filelogs","post_id='$tid'","1","id") as $files){
						
						$file = $files["file_path"];
						
					}
					
					if(file_exists($file)){
						
						unlink($file);
						
					}
					
				}
				
				if($wt == "external"){}
				
				if($wt == "internal"){
					
					if(x_count("createusers","id='$uid' LIMIT 1") > 0){ // Return funds
						
						$getdbv =  sh_getCryptoFiatdb($coin);
						
						x_updated("createusers","id='$uid'","$getdbv = $getdbv + $camount","<script>showalert('wallet Balance updated');</script>","<script>showalert('Failed to balance ');</script>");
						
					}
					
				}
				
				x_del("stransactions","id='$id' AND tranx_id='$tid'","<script>showalert('Transaction record deleted!');</script>","<script>showalert('Failed to delete transaction!');</script>");
				
				
			}else{
				
				x_toasts("You cannot cancel an ongoing transaction");
				
			}
			
		}else{
			
			x_toasts("Invalid transaction detected");
			
		}
		
	}else{
		
		x_toasts("missing parameter");
		
	}

?>


