	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
		<div class="panel panel-default">
			<div class="panel-body">
				<p style="color:green" class="money-dex">		
				<?php
					$getFiat = x_getsingleupdate("createusers","fiat","id='$userid'");
					sh_autoFiat($getFiat , $userid);
				?>
				
				
				</p>
				<h5 class="money-title">FIAT WALLET</h5>
			</div>
		</div>
	</div>	
	
	
	
	
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 m-up">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<p class="money-dex"><?php echo number_format(x_getbalance("btc_wallet",$userid),8);?> BTC
				</p>
				<h5 class="money-title color-p">BTC WALLET<span class="small-money"> ~ <?php echo sh_getdollarbal($userid , "btc");?></span></h5>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 m-up">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<p class="money-dex" style="color:green">
					<?php echo number_format(x_getbalance("eth_wallet",$userid),2);?> ETH
				</p>
				<h5  class="money-title">ETH WALLET<span class="small-money"> ~ <?php echo sh_getdollarbal($userid , "eth");?></span></h5>
				
			</div>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 m-up">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<p class="money-dex">
					<?php echo number_format(x_getbalance("usdt_wallet",$userid),2);?> USDT
				</p>
				<h5 class="money-title color-p">USDT WALLET<span class="small-money"> ~ <?php echo sh_getdollarbal($userid , "usdt");?></span></h5>
				
			</div>
		</div>
	</div>
	