<?php 

	if(isset($hasher)){
		
		$split = explode("-",$hasher);
		
		$tid = $split[0]; $id = $split[1];
		
		$timer = x_curtime(0,1);
		
		
		if(x_count("stransactions","id='$id' AND tranx_id='$tid' LIMIT 1") > 0){
			
			foreach(x_select("recieved_status , transfer_money_status","stransactions","id='$id' AND tranx_id='$tid'","1","id desc") as $key){
				
			$r_status = $key["recieved_status"]; $m_status = $key["transfer_money_status"];
			
			}
			
			if($r_status == "0"){
				
				x_toasts("Confirm coin before making payment!");
				
				exit();
			}
			
			if($m_status == "0"){
				
				x_updated("stransactions","id='$id' AND tranx_id='$tid'","transfer_money_status='1' , transferred_at='$timer'","<script>showalert('Payout completed successfully!');</script>","<script>showalert('Failed to complete payout!');</script>");
				
			}else{
				
				x_toasts("Payout was made before!");
				
			}
			
			
			
		}else{
			
			x_toasts("Invalid transaction detected");
			
		}
		
	}else{
		
		x_toasts("missing parameter");
		
	}

?>


