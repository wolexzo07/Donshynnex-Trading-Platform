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
					<center><img src="img/icon/btc2usd.png" class="avatar"/></center>
					</li>
					
					<li class="list-group-item">
					
						<div class="btc-converter">
						<p class="mt-1"><font style="color:green;"><i class="fa fa-calculator"></i>&nbsp;&nbsp;Bitcoin to Dollar |</font> <font style="color:purple;">| Dollar to Bitcoin Calc : </font></p>
						<form class="pb-3" autocomplete="off">
				<p class="textStyler">Amount (BTC):</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
							<script src="js/btcalone.js"></script>
								<input onkeyup="x_btcajax('conversion' , 'convert2usd',this.value)" type="number" style="height:45px;" autocomplete="off" required="required" name="amountinbtc" id="amountinbtc" class="form-control" min="" max="" placeholder="Enter amount in BTC" />
							</div>
						</div>
						
						
						
						<p class="textStyler">Amount (USD):</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon">$</span>
								<input onkeyup="x_btcajax('conversion' , 'convert2btc',this.value)" type="number" style="height:45px;" autocomplete="off" required="required" name="amountinusd" id="amountinusd" class="form-control" min="" max="" placeholder="Enter amount in USD" />
							</div>
						</div>
						
						<p id="conversion"></p>
						
							</form>
						</div>
					
					</li>
				
				</ul>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	</div>
	

							
</div>
		