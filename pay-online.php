<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
?>
<script type="text/javascript">
				function loader(){
					var reg = document.getElementById("amountme").value;
					if(reg == ""){
						//alert("Enter top-up amount");
						document.getElementById("LoginResult").innerHTML='';
						return false;
					}else{
						load("paybill?memy="+reg);
						return false;
					}

				}
			</script>	
<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			
				<ul class="list-group mt-2">
					<li class="list-group-item">
					<center><img src="img/icon/wallet-top.png" class="avatar"/></center>
					</li>
					
					<li class="list-group-item">
					
						<div class="topup-wallet pb-2">
	<div class="row">
	<div class="col-md-12">
	<div id="LoginResult"></div>
					
	<script src="workitout.js"></script>
	
	<form method="POST" onsubmit="return loader()">	 
	  <h4><i class='fa fa-credit-card'></i>&nbsp;&nbsp;Online <font style='color:green;'>Payment</font></h4>  
	  <div class="text-right mt-1 mb-1">
	  <button class="btn btn-success"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; Process</button>
	  </div>
	
		<p class="textStyler">Amount (NGN):</p>
		<div class="form-group mt-1">
			<div class="input-group">
			<span class="input-group-addon">NGN</span>
				<input onkeyup="x_btcajax2('amountinbtc' , 'convert2btc2',this.value)" type="text" style="height:45px;" autocomplete="off" required="required" id="amountme" name="amount" class="form-control" min="1000" max="" placeholder="Enter amount in NGN" />
			</div>
		</div>
		<p class="btn btn-default mb-1 mt-1"><b>Balance = <?php
				$userid = x_clean($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
				echo "NGN ".number_format(x_getbalance("naira_wallet",$userid),2);
								?> </b></p>
	  
	    </form>
			<!----<div class="btn-group btn-group-sm mt-2">
					  <span onclick="load('pay-online')" type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;</span>
					  <span type="button" id="payoff" class="btn btn-success"><i class="fa fa-money"></i> &nbsp;&nbsp;</span>	
					</div>--->
	  </div>
  
	  </div>

						</div>
					
					</li>
				
				</ul>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	</div>
	

							
</div>
		