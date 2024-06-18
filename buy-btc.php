<?php ?>
<div class="row">
						
	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	
		<ul class="list-group mt-2">
					
			<li class="list-group-item">
			
				<div class="buy-btco">

							<form id="buybtcnow" autocomplete="off">
							
								<p class="textStyler">Pay From : </p>
								
								<div class="form-group mt-1">
								
									<div class="input-group">
									
										<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
										
										<select onchange="switchAction(this.value)" required="" style="height:45px;" name="wallet" class="form-control">
											
											<?php
												if(x_count("fiat_crypto","type='fiat' AND status='1'") > 0){
													
													foreach(x_select("name , symbol","fiat_crypto","type='fiat' AND status='1'","4","id") as $key){
														
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
											
										</select>
										
									</div>
								
								</div>
							
								<p class="textStyler">Amount in Crypto:</p>
							
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
								
								<button class="btn btn-primary"><i class="fa fa-send"></i>&nbsp; Process Order</button>
									
							</form>
							
							<div id="response-one"></div>
							
				 </div>
						
			 </li>
				
		 </ul>

	</div>
	
</div>
		