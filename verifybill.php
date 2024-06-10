<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("../justlibrary/Paystack.php");
?>
<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			
				<ul class="list-group mt-2">
					<li class="list-group-item">
						<center><img src="img/icon/wallet-top.png" class="avatar"/></center></li>
					<li class="list-group-item">

						<div class="payoffine pb-3">
						
	<?php
	if(x_validatesession("TIMBOSS_CRYPTBUY_EMAIL")){
	
	if(x_count("paymentkeys","status='Yes' LIMIT 1") > 0){
	$py = $_GET['reference'];
	foreach(x_select("secretkey,publickey","paymentkeys","status='Yes'","1","id") as $key){
		$sk = $key["secretkey"];
		$pk = $key["publickey"];

		$paystack = new Paystack($sk);
		$trx = $paystack->transaction->verify(
			[
			 'reference'=>$_GET['reference']
			]
		);
		if(!$trx->status){
			exit($trx->message);
		}

		if('success' == $trx->data->status){
			
		// Capturing data from payment url  
		
		$pid = xg("pid"); // Getting user id
		$ptoken = xg("ptoken"); // Getting Token
		$user = xg("uid"); // Getting user email
		$charge = xg("ch"); // Getting charge
		$amt = xg("pamt");  // Amount paid without charges
		$ref = xg("reference"); // Getting reference
		$os = xos();$br = xbr();$ip = xip(); // Getting devices
		$time = x_curtime("0","1");
		$tok = sha1($user.$ref);
		
			if(x_count("createusers","id='$pid' AND token='$ptoken' LIMIT 1") > 0){

				// Getting user wallet details started

				foreach(x_select("naira_wallet,name","createusers","id='$pid' AND token='$ptoken'","1","id") as $userdata){
					$bal = $userdata["naira_wallet"]; // Naira wallet
					$namex = $userdata["name"];	// User name
				}

				$new_amount = $bal + $amt;

				// Getting user wallet details ended

			// Avoiding duplicate payments / reuse of payment ID

			if(x_count("topup_transaction","paystack_id='$ref' LIMIT 1") > 0){

			x_print("<p class='rtext'>Transaction record already existing!</p>");

			}else{
		
		// Capturing transaction details
		
		x_insert("type,wallet_credited,balance_after,paystack_id,paystack_charge,owner,currency,amount,status,paydate,token,os,br,ip","topup_transaction","'online','naira wallet','$new_amount','$ref','$charge','$pid','NGN','$amt','approved','$time','$tok','$os','$br','$ip'","<center><img src='img/successful_payment.png' class='img-responsive' style='width:100px;margin-top:10pt'/></center><p class='mt-1 text-center'>Payment was successful</p>","<p class='text-center'><i class='fa fa-minus hipe'></i><br/></br>Failed to make payment<br/><br/></p>");
		
		// crediting user wallet started

		x_update("createusers","id='$pid'","naira_wallet='$new_amount'","","<p class='rtext'>Failed to update balance!</p>");
		
		// Inserting a copy of the transaction
		$rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");
		
		x_insert("tranx_id,user_id,wallet_type,type,amount,wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'$ref','$pid','ngn','topup','$amt','$new_amount','1','$tok','$os','$ip','$br','$rtimen','$stimen'","&nbsp;","<p class='rtext'>Failed to insert copy of transaction</p>");

		//insert notification data started

		
		$refamt = number_format($amt,2);
		
		// Getting company name
		$company = x_getsingle("select company_name from adminbank where id='1' AND status='1' LIMIT 1","adminbank where id='1' AND status='1'","company_name");
		
		x_insert("type,title,user_id,message,status,date_time,time_stamp","notification","'p','<b>NGN $refamt</b> WAS CREDITED TO YOUR WALLET.','$pid','<p>Hi <b>$namex</b>,</p>Your wallet has been credited with the amount (<b>NGN $refamt</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>$company TEAM</b>','0','$rtimen','$stimen'","&nbsp;","Failed to send notification");
		
		?>
		<div class="text-center"><button onclick="load('homedash')" class="btn btn-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;Completed</button></div>
		<?php
			}
			// avoiding duplicate payments / reuse of payment ID

			}else{
				x_print("<p class='rtext'>Invalid user detected!</p>");
			}

				//validation Ended
			}

		}

	}else{
		echo "Payment key deactivated!";
		#exit();
		}


}else{
	x_print("<p class='rtext'>Session Deactivated</p>");
}



?>
</div>
					</li>
				</ul>	
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>		
	</div>
</div>
<style>
.hipe{
	font-size:50pt;
	color:green;
}
</style>