<ul class="list-group mt-2">

		<li style="padding:20px;" class="list-group-item">
				<div class="deskimage text-center"><img src="" class="userprofile"/> &nbsp;&nbsp;&nbsp;
				Hi ,  <b>
				<?php 
					
				?>
			</b> </div>
		</li>

		<li class="list-group-item">
		<h5>
		<span class="badge coin-design">
		<i class="fa fa-bitcoin"></i></span>&nbsp;&nbsp;&nbsp;
		
		<b><?php echo number_format(x_getbalance("btc_wallet",$userid),8);?>BTC</b>  <br/>
		
		<small style="font-weight:;font-size:9pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo "USD ".x_btc2usd(x_getbalance("btc_wallet",$userid));?></small>
		</h5>
		</li>

		<li class="list-group-item"><h5><span style="padding:8px;border-radius:100px;-moz-border-radius:100px;-webkit-border-radius:100px;-o-border-radius:100px;background-color:purple;" class="badge"><i class="fa fa-money"></i></span>&nbsp;&nbsp;&nbsp;<b>
		<?php 
			echo number_format(x_getbalance("eth_wallet",$userid),2);
		?></b> ETH<span class="fa fa-credit-card pull-right"></span></h5></li>

		<li class="list-group-item"><h5><span style="padding:8px;border-radius:100px;-moz-border-radius:100px;-webkit-border-radius:100px;-o-border-radius:100px;background-color:purple;" class="badge"><i class="fa fa-money"></i></span>&nbsp;&nbsp;&nbsp;<b>
		<?php 
			echo number_format(x_getbalance("usdt_wallet",$userid),2);
		?></b> USDT<span class="fa fa-credit-card pull-right"></span></h5></li>

		<li class="list-group-item"><h5><span style="padding:8px;border-radius:100px;-moz-border-radius:100px;-webkit-border-radius:100px;-o-border-radius:100px;background-color:purple;" class="badge"><i class="fa fa-money"></i></span>&nbsp;&nbsp;&nbsp;<b>NGN 
		<?php 
			echo number_format(x_getbalance("naira_wallet",$userid),2);
		?></b> <span class="fa fa-credit-card pull-right"></span></h5></li>
		
</ul>