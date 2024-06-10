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
				<h4 style="display:none;" class="headerText"><i class="fa fa-money"></i>&nbsp;&nbsp; FUND <font style="color:purple;">WALLET</font></h4>
				
				<ul class="list-group mt-2">
					<li class="list-group-item">
					<center><img src="img/icon/wallet-top.png" class="avatar"/></center>
					
					</li>
					<li class="list-group-item">
					<script src="workitout.js"></script>
					
						<div style="display:none;" class="payoffine">
						
						<div id="LoginResult"></div>
						
						<form id="makepaymentoffline" autocomplete="off">
						
						<div class="mt-1 mb-1 text-right">
							<button class="btn btn-sm btn-default"><i class="fa fa-send"></i> &nbsp;&nbsp;I have paid</button>
						</div>
						
						<p class="mt-1">Alert us through this form after making transfer to the account provided below and your wallet will be credited once payment is verified:</p>
						<p class="textStyler">Amount Tranferred:</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon">NGN</span>
								<input type="number" style="height:45px;" autocomplete="off" required="required" name="amount" id="amount" class="form-control" min="1000" max="" placeholder="Enter amount" />
							</div>
						</div>
						<p class="textStyler">Transaction Date:</p>
						<div class="form-group mt-1">
						
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="date" style="height:45px;" autocomplete="off" required="required" name="date" id="date" class="form-control" placeholder="Transaction Date" />
							</div>
						</div>
						
						<p class="textStyler">I tranferred from (yours):</p>
						<div class="form-group mt-1">

							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bank"></i></span>
								<?php
								if(x_count("nigeriabanklisting","status='1' LIMIT 1") > 0){
									?><select style="height:45px;" name="yourbank" class="form-control"><?php
									foreach(x_select("banks","nigeriabanklisting","status='1'","30","banks") as $bank){
										$banks = $bank["banks"];
										?>
										<option value="<?php echo $banks;?>"><?php echo $banks;?></option>
										<?php
									}
									?></select><?php
								}else{
									?>
									<option value="">No bank found</option>
									<?php
								}
								?>
							</div>
						</div>
						
					<p class="textStyler">Name on account used:</p>
						<div class="form-group mt-1">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" style="height:45px;" autocomplete="off" required="required" name="nameonacct" id="nameonacct" class="form-control" min="1000" max="" placeholder="Name on account" />
							</div>
						</div>
						
						<p class="textStyler">I tranferred to (company):</p>
						<div class="form-group mt-1">

							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bank"></i></span>
								<?php
								if(x_count("adminbanklist","status='1' AND type='bankwallet' LIMIT 1") > 0){
									?><select style="height:45px;" name="ourbank" class="form-control"><?php
									foreach(x_select("bank_name,acct_name,acct_numb","adminbanklist","status='1' AND type='bankwallet'","5","id") as $bank){
										$bn = $bank["bank_name"];
										$acn = $bank["acct_name"];
										$acnumb = $bank["acct_numb"];
										?>
										<option value="<?php echo $bn;?>"><?php echo $bn." ($acnumb) - ".$acn;?></option>
										<?php
									}
									?></select><?php
								}else{
									?>
									<option value="">No bank found</option>
									<?php
								}
								?>
							</div>
						</div>
						
						<p class="textStyler">Note (optional):</p>
						<textarea style="resize:none;" name="note" placeholder="Enter Note" class="form-control"></textarea>
						<input type="hidden" name="etoken" value="<?php echo sha1(uniqid());?>"/>
						</form>
						<?php
							if(x_count("adminbank","status='1' LIMIT 1") > 0){
								?><table style="font-size:8pt;text-transform:;" class="mt-1 table"><?php
								foreach(x_select("0","adminbank","status='1'","1","id") as $bank){
									$bn = $bank["bank_name"];
									$an = $bank["acct_name"];
									$anb = $bank["acct_numb"];
									$btc_addr = $bank["btc_addr"];
									?>
									<tr><th>Bank Name</th><td><?php echo $bn;?></td></tr>
									<tr><th>Account Name</th><td><?php echo $an;?></td></tr>
									<tr><th>Account Number</th><td><?php echo $anb;?></td></tr>
									<?php
								}
								?></table><?php
								
							}
						?>
						
							
							
						</div>
						
					<div class="btn-group btn-group-sm">
					  <span onclick="load('pay-online')" type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;Pay Online</span>
					  <span type="button" id="payoff" class="btn btn-success"><i class="fa fa-money"></i> &nbsp;&nbsp;Pay Offline</span>	
					</div>
					
					<script>
					$(document).ready(function(){
						$("#payoff").click(function(){
							$(".payoffine").toggle();
						});
					});
					</script>
					
					</li>
				
				</ul>
				
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	</div>
	

							
</div>
		