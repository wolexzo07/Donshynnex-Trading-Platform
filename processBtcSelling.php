<?php
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
if(x_validatepost("etoken") && x_validatepost("wallet") && x_validatepost("amountinbtc") ){
	
	$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]); // Getting User ID
	$wallet = x_clean(x_post("wallet")); // Wallet in use internal|external
	$amtinbtc = x_clean(x_post("amountinbtc")); // Amount in Btc
	$amtinusd = x_clean(x_post("amountinusd"));	// Amount in usd 
	
	
	// Validations started
	
	if($wallet == ""){echo "<p class='rtext'>Payment wallet missing</p>";exit();}
	if($amtinbtc == "" || !is_numeric($amtinbtc)){echo "<p class='rtext'>Enter amount in BTC</p>";exit();}
	

	
	
	
	//if($amtinusd == "" || !is_numeric($amtinusd)){echo "Enter amount in usd";exit();}
	
	// Validations ended
	
	$amtinusd = x_btc2usdnf($amtinbtc);	// Amount in usd recalculated
	$sellrate = x_getrates("buy_rate"); // Getting our Buying Rate
	$amtinnaira = $amtinusd * $sellrate;	// Amount in naira Based on selling rate
	$tranx_id = "CRSL".$userid.str_shuffle(DATE("YmdHis"));
	
	$token = sha1($userid).md5($userid.uniqid());
	$os = xos();$br = xbr();$ip = xip();$timer = x_curtime('0','1');
	$create = x_dbtab("selling_transactions","
	btcpaymentproof TEXT NOT NULL,
	user_id INT NOT NULL,
	tranx_id VARCHAR(255) NOT NULL,
	wallet_type ENUM('','internal','external') NOT NULL,
	naira_usd_rate DOUBLE NOT NULL,
	amount_in_btc DOUBLE NOT NULL,
	amount_in_usd DOUBLE NOT NULL,
	amount_in_naira DOUBLE NOT NULL,
	sender_btcaddress TEXT NOT NULL,
	company_btc_address TEXT NOT NULL,
	btc_wallet_balance DOUBLE NOT NULL,
	btc_recieve_status ENUM('0','1','2') NOT NULL,
	transfer_money_status ENUM('0','1') NOT NULL,
	os VARCHAR(50) NOT NULL,
	br VARCHAR(50) NOT NULL,
	ip VARCHAR(30) NOT NULL,
	date_time VARCHAR(100) NOT NULL
	","MYISAM");
	
	
	if($create){
	
	// Validating duplicate transaction
	 if(x_count("selling_transactions","tranx_id='$tranx_id' LIMIT 1") > 0){
		 x_print("<p class='rtext'>Transaction <b>$tranx_id</b> already exit</p>");
	 }else{
		if($wallet == "internal"){
			$btc_balance = x_getbalance("btc_wallet",$userid); // Getting user BTC Balance
			
			// Validating the balance in the user btc wallet
			
			if($amtinbtc > $btc_balance){
				x_print("<p class='rtext'>Insufficient BTC Balance</p>");
			}else{
				
	// Inserting Record into the database
	
	$new_btc_balance = round(($btc_balance - $amtinbtc),8) ;
	
	// Updating user btc wallet balance
	
	x_update("createusers","id='$userid'","btc_wallet='$new_btc_balance'","","Failed to update");
	
	// Inserting transaction details into the database
	$f_amtinusd = "USD ".number_format($amtinusd,2);
	$f_amtinnaira = "NGN ".number_format($amtinnaira,2);
	
		$sellrate_f = "NGN ".number_format($sellrate,2)." / USD";
	
	x_insert("naira_usd_rate,btc_wallet_balance,user_id,tranx_id,wallet_type,amount_in_btc,amount_in_usd,amount_in_naira,btc_recieve_status,transfer_money_status,os,br,ip,date_time","selling_transactions","'$sellrate','$new_btc_balance','$userid','$tranx_id','$wallet','$amtinbtc','$amtinusd','$amtinnaira','1','0','$os','$br','$ip','$timer'","<p class='rtext'>Transaction created! Details Below:</p><table class='table table-hover table-bordered'><tr><td>Amount (BTC)</td><th>$amtinbtc BTC</th></tr><tr><td>Amount (USD)</td><th>$f_amtinusd</th></tr><tr><td>Amount (NGN)</td><th>$f_amtinnaira</th></tr><tr><td>Rate</td><th>$sellrate_f</th></tr><tr><td>Status</td><th><font style='color:green;'>Pending</font></th></tr><tr><td>Tranx id</td><th><font style='color:purple;'>$tranx_id</font></th></tr></table>","<p class='rtext'>Failed to create transaction</p>");
	
	// Insert another copy of this transaction into all transaction table
	$tim = x_curtime(0,0);
	x_insert("tranx_id,user_id,wallet_type,type,amount,wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'$tranx_id','$userid','btc','sellbtc-$wallet','$amtinbtc','$new_btc_balance','0','$token','$os','$ip','$br','$timer','$tim'","&nbsp;","<p class='rtext'>Failed to create transaction copy</p>");
	
	//insert into nofication system
	
	
	
			}
			
		}elseif($wallet == "external"){
			
			//Getting Recieving Btc Address from db
			
			$btc_addr = x_getsingle("SELECT btc_addr FROM adminbank WHERE status='1' LIMIT 1","adminbank WHERE status='1' LIMIT 1","btc_addr");
			
			$content = "bitcoin:$btc_addr?amount=$amtinbtc&amp;label=Payment";
			$path_validation = 1;
			$path = "qrcoder/".sha1($tranx_id).".png";
			//if(file_exists($path)){
			//}else{
			//}
			x_qrcode($content,$path,$path_validation);
			
			?>
			<ul style="overflow:hidden;" class="list-group">
			<li class="list-group-item">Send exactly <b><?php echo $amtinbtc." BTC";?></b> to the Bitcoin address provided below and click on "I have sent" button once you are done:</li>
			<li class="list-group-item">
			<center><img src="<?php echo $path;?>"/><br/><br/>
			<i class="fa fa-bitcoin"></i> &nbsp;&nbsp;<?php echo $btc_addr;?> <button class="btn btn-sm btn-default"><i class="fa fa-copy"></i>&nbsp;&nbsp;copy</button>
			</center></li>
			<li class="list-group-item"></li>
			<li class="list-group-item">
			<script src="workitout.js"></script>
			<div id="btcResult"></div>
			
			<form id="confirmBTC">
				<p class="textStyler">Upload screenshot:</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-cloud-upload"></i></span>
								<input type="file" style="height:45px;padding-top:10px;" autocomplete="off" required="" accept=".jpeg,.png,.jpg" name="upload" id="upload" class="form-control" />
							</div>
						</div>
						
						<p class="textStyler">Sender BTC Address:</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
								<input type="text" style="height:45px;" autocomplete="off" name="sender_addr" id="sender_addr" class="form-control" min="" max="" placeholder="Sender Btc wallet Address" />
							</div>
						</div>
				<input type="hidden" name="etoken" value="<?php echo $token;?>"/>
				<input type="hidden" name="tranx_id" value="<?php echo $tranx_id;?>"/>
				<input type="hidden" name="wallet" value="<?php echo $wallet;?>"/>
				<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
				<input type="hidden" name="amtinbtc" value="<?php echo $amtinbtc;?>"/>
				<input type="hidden" name="amtinnaira" value="<?php echo $amtinnaira;?>"/>
				<input type="hidden" name="amtinusd" value="<?php echo $amtinusd;?>"/>
				<!---<input type="hidden" name="sender_btcaddr" value="<?php //echo $senderbtcaddr;?>"/>--->
				<input type="hidden" name="btc_addr_used" value="<?php echo $btc_addr;?>"/>
				<input type="hidden" name="proofpath" value="<?php echo $dbpath;?>"/>
				
				<button class="btn btn-default"><i class="fa fa-send"></i> &nbsp;&nbsp;I have sent</button>
			</form>
			</li>
			</ul>
			
			<?php

		}else{
			x_print("Invalid wallet detected");
		}
	 }
	
	
	}else{
		x_print("Failed to create table!");
	}
	
	
}
	
	
	?>