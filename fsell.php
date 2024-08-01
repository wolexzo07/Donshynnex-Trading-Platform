<?php
/***$f_amtinusd = "USD ".number_format($amtinusd,2);
	$f_amtinnaira = "NGN ".number_format($amtinnaira,2);
	$sellrate_f = "NGN ".number_format($sellrate,2)." / USD";***/
	
	//x_insert("naira_usd_rate,btc_wallet_balance,user_id,tranx_id,wallet_type,amount_in_btc,amount_in_usd,amount_in_naira,btc_recieve_status,transfer_money_status,os,br,ip,date_time","stransactions","'$sellrate','$new_btc_balance','$userid','$tranx_id','$wallet','$amtinbtc','$amtinusd','$amtinnaira','1','0','$os','$br','$ip','$timer'","<p class='rtext'>Transaction created! Details Below:</p><table class='table table-hover table-bordered'><tr><td>Amount (BTC)</td><th>$amtinbtc BTC</th></tr><tr><td>Amount (USD)</td><th>$f_amtinusd</th></tr><tr><td>Amount (NGN)</td><th>$f_amtinnaira</th></tr><tr><td>Rate</td><th>$sellrate_f</th></tr><tr><td>Status</td><th><font style='color:green;'>Pending</font></th></tr><tr><td>Tranx id</td><th><font style='color:purple;'>$tranx_id</font></th></tr></table>","<p class='rtext'>Failed to create transaction</p>");
	
	// Insert another copy of this transaction into all transaction table
	
	$tim = x_curtime(0,0);
	
	//x_insert("tranx_id,user_id,wallet_type,type,amount,wallet_balance_after,status,token,os,ip,br,date_time,time_stamp","transaction","'$tranx_id','$userid','btc','sellbtc-$wallet','$amtinbtc','$new_btc_balance','0','$token','$os','$ip','$br','$timer','$tim'","&nbsp;","<p class='rtext'>Failed to create transaction copy</p>");
?>