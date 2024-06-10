<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
?>
<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			
				<ul class="list-group mt-2">
					<li class="list-group-item">
					<center><img src="img/icon/sell-btc.png" class="avatar"/></center>
					</li>
					
					<li class="list-group-item">
					
						<div class="sell-btc">
						
						<div id="LoginResult"></div>
						
			<p style="display:none;" class="mt-1"><font style="color:green;">Sell Bitcoin from cryptabuy wallet |</font> <font style="color:purple;">| External wallet to recieve local currency into your bank account : </font></p>
				<script src="workitout.js"></script>			
				<form class="pb-3" id="sellbtcnow" autocomplete="off">
						<div class="text-right mt-1 mb-2">
						 <button class="btn btn-default"><i class="fa fa-send"></i>&nbsp; Sell BTC</button>
						</div>
				<p class="textStyler">Sell Bitcoin From : </p>
				<div class="form-group mt-1">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
				<select onchange="switchAction(this.value)" required="" style="height:45px;" name="wallet" class="form-control">
				<option value="">Choose wallet ? </option>
				<option value="internal">Wallet - <?php
				$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
				echo number_format(x_getbalance("btc_wallet",$userid),8)." BTC";
								?> 
				</option>
				<option value="external">External wallet (Blockchain, Binance, Luno etc.) </option>
				
				</select>
				</div></div>
				
				<p class="textStyler">Amount (BTC):</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
							<script src="js/btcalone.js"></script>
	<input onkeyup="x_btcajax2('amountinusd' , 'convert2usd2',this.value)" type="text" style="height:45px;" autocomplete="off" required="required" name="amountinbtc" id="amountinbtc" class="form-control" placeholder="Enter amount in BTC" />
							</div>
						</div>
						
						<p id="conversion"></p>
						
						<p class="textStyler">Amount (USD):</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon">$</span>
								<input onkeyup="x_btcajax2('amountinbtc' , 'convert2btc2',this.value)" type="text" style="height:45px;" autocomplete="off" required="required" name="amountinusd" id="amountinusd" class="form-control" min="" max="" placeholder="Enter amount in USD" />
							</div>
						</div>
						
						<input type="hidden" value="<?php echo sha1(uniqid());?>" name="etoken"/>
						
								
						    </form>
						</div>
					
					</li>
				
				</ul>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	</div>
	

							
</div>
		