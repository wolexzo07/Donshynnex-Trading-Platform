
<div class="row">
						
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	
		<ul class="list-group mt-2">
				
			<li class="list-group-item pb-2" style="border:;">
					
					<div class="sell-btc">
						
						<div id="response-two"></div>
						
						<form id="sellbtcnow" autocomplete="off">
				
							<div class="row">
							
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									
									 <button class="btn btn-default pull-right mt-1">Sell Asset</button>
									 
									</div>
							
							</div>
							
							<div class="row mb-1">
							
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									
										 <p class="textStyler">Wallet Type: </p>
										 
										 <div class="row">
										 
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											
												<select onchange="changerExInt(this.value)" required="" style="height:45px;" name="wallet" class="form-control walType">
												
													<option value="internal">Internal wallet</option>
													<option value="external">External wallet (Binance , Kucoin , Okx etc.)</option>
												
												</select>
												
											</div>
										 
											
										 </div>
									 
									</div>
							
							</div>
							
							<div class="row">
							
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									
										<p class="textStyler">Crypto Assets : </p>
										
										<div class="form-group mt-1">
										
											<div class="input-group">
											
												<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
												
												<select required="" style="height:45px;" name="wallet-internal" class="form-control wallet-internal winternal">
														
														<?php sh_listFiatCryptBal("c" , $userid);?>
														
												</select>
												
												<select required="" style="height:45px;display:none;" name="wallet-external" class="form-control wallet-external wexternal">
														
														<?php sh_getallFiatCrypt("c" , "0");?>
														
												</select>
												
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									
										<p class="textStyler">Fiat Payout : </p>
										
										<div class="form-group mt-1">
										
											<div class="input-group">
											
												<span class="input-group-addon"><i class="fa fa-bank"></i></span>
												
												<select required="" style="height:45px;" name="fiat" class="form-control">
														
														<?php
															echo sh_getallFiatCrypt("f" , "0");
														?>
														
												</select>
												
											</div>
											
										</div>
										
									</div>
								
							</div>
									

							
							<div class="row">
							
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									
									<p class="textStyler">Amount in crypto:</p>
									
									<div class="form-group mt-1">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
											
											<input onkeyup="crypto_conversion_usd_sec(this.value)" type="text" style="height:45px;" autocomplete="off" required="required" name="amountinbtc" id="amountinbtc" class="form-control byamountinbtc" placeholder="Enter amount in Crypto" />
										</div>
									</div>
									
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								
									<p class="textStyler">Amount in USD:</p>
									
									<div class="form-group mt-1">
										<div class="input-group">
											<span class="input-group-addon">$</span>
											<input onkeyup="crypto_usd_conversion_sec(this.value)" type="text" style="height:45px;" autocomplete="off" required="required" name="amountinusd" id="amountinusd" class="form-control byamountinusd" min="" max="" placeholder="Enter amount in USD" />
										</div>
									</div>
									
								</div>
							
							</div>

									<p class="sl-response"></p>

									<input type="hidden" value="<?php echo sha1(uniqid());?>" name="etoken"/>
									
									<input type="reset" value="reset" style="display:none;" class="reset-sell"/>
												
						    </form>
							
							
							
							
						</div>
					
					</li>
				
				</ul>
	</div>
						
</div>

<script>
													
	function crypto_conversion_usd_sec(amountInCrypto){
		
		let walletType = $(".walType").val();
		
		let byasset;
		
		if(walletType == "internal"){
			
			byasset = $(".winternal").val();
			
		}
		
		if(walletType == "external"){
			
			byasset = $(".wexternal").val();
			
		}
		
		let param = byasset+"-"+amountInCrypto;
		
		if(amountInCrypto == "" || isNaN(amountInCrypto)){
			
			showalert("Enter valid amount");
			
			return false;
		}
		
		contentViewer(".sl-response" , "convert_crypto_usd" , param);
		
	}

	function crypto_usd_conversion_sec(amountInDollar){
		
		let walletType = $(".walType").val();
		
		let byasset;
		
		if(walletType == "internal"){
			
			byasset = $(".winternal").val();
			
		}
		
		if(walletType == "external"){
			
			byasset = $(".wexternal").val();
			
		}
		
		let param = byasset+"-"+amountInDollar;
		
		if(amountInDollar == "" || isNaN(amountInDollar)){
			
			showalert("Enter valid amount");
			
			return false;
		}
		
		contentViewer(".sl-response" , "convert_usd_crypto" , param);
		
	}
	
</script>