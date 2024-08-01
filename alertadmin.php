
				<div style="display:none;padding-bottom:20px;" class="payoffine">
					
					<div id="off-response"></div>
					
					<form id="makepaymentoffline" autocomplete="off">
					
					<div class="mt-1 mb-1 text-right">
						<button class="btn btn-sm btn-success"><i class="fa fa-send"></i> &nbsp;&nbsp;Send Details</button>
					</div>
					
					<p class="mt-1">Alert us through this form after making transfer to the account provided below and your wallet will be credited once payment is verified:</p>
					
					
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						
								<p class="textStyler">Amount Tranferred:</p>
					
								<div class="form-group mt-1">
									<div class="input-group">
									<span class="input-group-addon current-fiat">NGN</span>
										<input type="number" readonly style="height:45px;" autocomplete="off" required="required" name="amount" id="amount" class="form-control amount-in-fia" min="" max="" placeholder="Enter amount" />
									</div>
								</div>
						
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						
								<p class="textStyler">Transaction Date:</p>
				
								<div class="form-group mt-1">
								
									<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="date" style="height:45px;" autocomplete="off" required="required" name="date" id="date" class="form-control" placeholder="Transaction Date" />
									</div>
								</div>
						
						</div>
					</div>
					
					<p class="textStyler">Upload Reciept (optional | max : 500kb):</p>
					
					<input type="file" class="f-loader mb-1 w-100" name="upload[]"/>
					
					<p class="textStyler">Transaction Details :</p>
					
					<textarea style="resize:none;" maxlength="150" required name="note" placeholder="Enter Note" class="form-control"></textarea>
					
					<input type="hidden" name="fiat" id="fiat-val"/>
					<input type="hidden" name="etoken" value="<?php echo sha1(uniqid());?>"/>
					<input type="reset" name="reset" style="display:none;" id="resetAlert" value="<?php echo sha1(uniqid());?>"/>
					
			</form>
			
</div>

<?php
	if(x_count("adminbank","status='1' LIMIT 1") > 0){
	
		foreach(x_select("0","adminbanklist","status='1'","1","id") as $bank){
			
			$bn = $bank["bank_name"];
			$an = $bank["acct_name"];
			$anb = $bank["acct_numb"];
			
			$btc_addr = $bank["btc_addr"];
			$eth_addr = $bank["eth_addr"];
			$usdt_addr = $bank["usdt_addr"];
			
			
			$mname = $bank["momo_acctname"];
			$mnumber = $bank["momo_acctnumber"];
			$mid = $bank["momo_id"];
			$momo_status = $bank["momo_status"];
			
			$ksh_numb = $bank["ksh_acctnumber"];
			$ksh_name = $bank["ksh_name"];
			$ksh_bn = $bank["ksh_bankname"];
			$ksh_status = $bank["ksh_status"];
			
			
			?>
			
				<div class="crypto-account" style="display:none;"></div>
				
				<div class="NGN-account" style="display:none;">
					<table style="font-size:8pt;text-transform:;" class="mt-1 table">
						<caption class="capTable">NIGERIA NAIRA ACCOUNT</caption>
						<tr><th>Bank Name</th><td><?php echo strtoupper($bn);?></td></tr>
						<tr><th>Account Name</th><td><?php echo strtoupper($an);?></td></tr>
						<tr><th>Account Number</th><td><?php echo $anb;?></td></tr>
					</table>
				</div>
				
				<div class="GHS-account" style="display:none;">
					<table style="font-size:8pt;text-transform:;" class="mt-1 table">
						<caption class="capTable">GHANA CEDIS ACCOUNT</caption>
						<tr><th>Momo Name</th><td><?php echo strtoupper($mname);?></td></tr>
						<tr><th>Momo Number</th><td><?php echo $mnumber;?></td></tr>
						<tr><th>Momo ID</th><td><?php echo $mid;?></td></tr>
					</table>
				</div>
				
				<div class="KSH-account" style="display:none;">
					<table style="font-size:8pt;text-transform:;" class="mt-1 table">
					<caption class="capTable">KENYA SHILLINGS ACCOUNT</caption>
						<tr><th>Bank Name</th><td><?php echo strtoupper($ksh_bn);?></td></tr>
						<tr><th>Account Name</th><td><?php echo $ksh_numb;?></td></tr>
						<tr><th>Account Number</th><td><?php echo $ksh_numb;?></td></tr>
					</table>
				</div>
				
				<div style="display:none;font-size:9pt" class="alert alert-warning n-money" role="alert">KINDLY SEND <span class="amount-computed f-bold"></span> TO THE ACCOUNT PROVIDED ABOVE AND NOTIFY US BY CLICKING <b>NOTIFY</b> BUTTON BELOW AFTER SENDING EXACT PAYMENT AMOUNT.</div>
				
				
				<div style="display:none;padding-bottom:20px;" class="funding-box">
				
					<form method="POST" id="input-money">
					
						<p class="mt-1 mb-1">Top-up Amount : </p>
						
						<input type="number" required placeholder="Enter top-up amount" class="form-control" name="amount" id="amount-topup"/>
						
						<p class="mt-1 mb-1">Select Fiat : </p>
						
						<select onchange="currencyChange(this.value)" required class="form-control" id="fiat-typ">
							<option value=""> Fiat type...</option>
							
							<?php sh_getAllfiatcrList();?>
							
						</select>
						
					</form>
					
					<button id="payoff" class="btn btn-primary confirm-payment mt-2 mb-0">NOTIFY</button>
					
					<div style="display:none;" class="response-click mt-1 mb-1" id="response-click"></div>

				</div>
				
				
				
				
			<?php
		}
		
	}
?>
