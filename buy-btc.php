<?php ?>
<div class="row">
						
	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	
		<ul class="list-group mt-2">
					
			<li class="list-group-item pb-2">
			
				<div  class="buy-btco">

							<form id="buybtcnow" autocomplete="off">
							
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<button class="btn btn-default pull-right mt-1 mb-1">Order Now</button>
									</div>
								</div>
								
								<div class="row">
								
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
											
										<p class="textStyler">Pay From : </p>
										
										<div class="form-group mt-1">
										
											<div class="input-group">
											
												<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
												
												<select onchange="" required="" style="height:45px;" name="wallet" class="form-control">
													
													<?php
														if(x_count("fiat_crypto","type='fiat' AND status='1'") > 0){
															
															foreach(x_select("name , symbol","fiat_crypto","type='fiat' AND status='1'","4","id") as $key){
																
																$sym = $key["symbol"];
																$cname = $key["name"];
																
																?>
																<option value="<?php echo $cname?>">
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
								
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									
										<p class="textStyler">I'm buying Crypto:</p>
										
										 <div class="form-group mt-1">
										
											<div class="input-group">
											
												<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
												
												<select required="" style="height:45px;" name="crypto" class="form-control">
													
													<?php
														if(x_count("fiat_crypto","type='crypto' AND status='1'") > 0){
															
															foreach(x_select("name , symbol","fiat_crypto","type='crypto' AND status='1'","4","id") as $key){
																
																$sym = $key["symbol"];
																$cname = $key["name"];
																
																?>
																<option value="<?php echo $cname?>">
																	 
																<?php echo $cname ." ~ ".number_format(x_getbalance($sym,$userid),4);?> 
																
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
								
									</div>
									
								</div>
								
								<div class="row">
								
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
									
										<p class="textStyler">Amount in Crypto:</p>
									
										<div class="form-group mt-1">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
												<input onkeyup="" type="text" style="height:45px;" autocomplete="off" required="required" name="amountinbtc" id="amountinbtc" class="form-control" placeholder="Enter amount in crypto" />
											</div>
										</div>
								
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
												
										<p class="textStyler">Amount in USD:</p>
								
										<div class="form-group mt-1">
											<div class="input-group">
											
												<span class="input-group-addon">$</span>
												
												<input onkeyup="" type="text" style="height:45px;" autocomplete="off" required="required" name="amountinusd" id="amountinusd" class="form-control" min="" max="" placeholder="Enter amount in USD" />
												
											</div>
										</div>
								
									</div>
								</div>
								
								<!---<p id="conversion"></p>--->
								
								<input type="hidden" value="<?php echo sha1(uniqid());?>" name="etoken"/>
								
							</form>
							
							<div id="response-one"></div>
							
				 </div>
						
			 </li>
				
		 </ul>

	</div>
	
</div>
		