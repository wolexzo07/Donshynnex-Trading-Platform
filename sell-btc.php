<?php ?>
<div class="row">
						
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	
		<ul class="list-group mt-2">
				
			<li class="list-group-item">
					
					<div class="sell-btc">

						<form id="sellbtcnow" autocomplete="off">
				
							<div class="mt-1 mb-2">
							
							 <button class="btn btn-default"><i class="fa fa-send"></i>&nbsp; Sell BTC</button>
							 
							</div>
									
							<p class="textStyler">Sell Bitcoin From : </p>
							
							<div class="form-group mt-1">
								<div class="input-group">
								
									<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
									
									<select onchange="switchAction(this.value)" required="" style="height:45px;" name="wallet" class="form-control">
											<option value="">Choose wallet ? </option>
											<option value="internal">Wallet - <?php echo number_format(x_getbalance("btc_wallet",$userid),8)." BTC";?> 
											</option>
											
												<?php
												if(x_count("fiat_crypto","type='crypto' AND status='1'") > 0){
													
													foreach(x_select("name , symbol","fiat_crypto","type='crypto' AND status='1'","4","id") as $key){
														
														$sym = $key["symbol"];
														$cname = $key["name"];
														
														?>
														<option value="internal-<?php echo $cname?>">
															Wallet - 
														<?php echo $cname ." ".number_format(x_getbalance($sym,$userid),2);?> 
														
														</option>
														<?php
													}
													
												}else{
													?>
													<option value="">No wallet</option>
													<?php
												}
											?>
											
											<option value="external">External wallet (Blockchain, Binance, Luno etc.) </option>
									</select>
								</div>
							</div>
							
									<p class="textStyler">Amount (BTC):</p>
									
									<div class="form-group mt-1">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
											
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
							
							<div id="response-two"></div>
							
							
						</div>
					
					</li>
				
				</ul>
	</div>
						
</div>
		