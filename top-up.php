<div class="row">
						
	<div class="col-md-2 col-lg-2 col-xs-12 col-sm-12"></div>
	<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
			
			
			
			<h4 style="display:none;" class="headerText"><i class="fa fa-money"></i>&nbsp;&nbsp; FUND <font style="color:purple;">WALLET</font></h4>
			
			<ul class="list-group mt-2">
				
				<li style="border:;" class="list-group-item">
				
					<div style="overflow:hidden;height:250px;" class="img-adj" align="center">
						<img src="img/iconnew/1.jpg" class="img-responsive"/>
					</div>
					
					<?php include("alertadmin.php");?>
				
					<div class="listButton">
					
					  <span disabled type="button" class="btn btn-primary w-100 mt-3 pt-1 pb-1"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;Online Funding</span>
					  
					  <span type="button" id="offline-shot" class="btn btn-success w-100 mt-2 mb-3 pt-1 pb-1"><i class="fa fa-bank"></i> &nbsp;&nbsp;Offline Funding</span>
					  
					</div>
				
				<script>
				$(document).ready(function(){
					
					$("#payoff").click(function(){
						
						let getFiatv = $("#fiat-typ").val();
						let amountTp = $("#amount-topup").val();
						
						$(".payoffine").show();
						
						$(".NGN-account").hide(300);
						$(".GHS-account").hide(300);
						$(".KSH-account").hide(300);
						$(".n-money").hide(300);
						$(".funding-box").hide(300);
						
						$(".current-fiat").text(getFiatv);
						$(".amount-in-fia").val(amountTp);
						$("#fiat-val").val(getFiatv);
						//$(".amount-in-fia").attrib("readonly","readonly");
						
					});
					
					$("#offline-shot").click(function(){
						
						$(".funding-box").show();
						
						$(".listButton").hide();
				
					});
				});
				
				function currencyChange(str){
					
					let amountTopup = $("#amount-topup").val();
					
					let famount = new Intl.NumberFormat().format(amountTopup);
					
					if(isNaN(amountTopup) || amountTopup == ""){

						$(".response-click").html("<div style='margin:0pt' class='alert alert-warning n-money' role='alert'>Enter top-up amount</div>");
						
						$(".response-click").show(300 , function(){
							
							//clearTimeout(timOut);
							
							const timOut = setTimeout(function(){
								
								$(".response-click").hide(300);
								
							},3000);
							
						});
						
						return false;
					}
					
					if(str == "BTC" || str == "ETH" || str == "USDT"){
						$(".crypto-account").show(300);
						$(".img-adj").hide(300);
						<?php
							if(isset($appStatus)){
								?>
								contentViewer(".crypto-account","generate-crypto-account","<?php echo $appContinua;?>-"+str+"-"+famount);
								<?php
							}
						?>
						$(".NGN-account").hide(300);
						$(".GHS-account").hide(300);
						$(".KSH-account").hide(300);
						$(".n-money").hide(300);
						$(".amount-computed").hide(300);
					}

					if(str == "NGN"){
						$(".img-adj").show(300);
						$(".NGN-account").show(300);
						$(".GHS-account").hide(300);
						$(".KSH-account").hide(300);
						$(".crypto-account").hide(300);
						$(".n-money").show(300);
						$(".amount-computed").show(300).text(str+" "+famount);
					}

					if(str == "GHS"){
						$(".img-adj").show(300);
						$(".NGN-account").hide(300);
						$(".GHS-account").show(300);
						$(".KSH-account").hide();
						$(".crypto-account").hide(300);
						$(".n-money").show(300);
						$(".amount-computed").show(300).text(str+" "+famount);
					}

					if(str == "KSH"){
						$(".img-adj").show(300);
						$(".NGN-account").hide(300);
						$(".GHS-account").hide(300);
						$(".KSH-account").show(300);
						$(".crypto-account").hide(300);
						$(".n-money").show(300);
						$(".amount-computed").show(300).text(str+" "+famount);
					}
					
					if(str == ""){
						$(".img-adj").show(300);
						$(".NGN-account").hide(300);
						$(".GHS-account").hide(300);
						$(".KSH-account").hide(300);
						$(".crypto-account").hide(300);
						$(".n-money").hide(300);
						$(".amount-computed").hide(300);
					}
					
				}
				
				</script>
				
				</li>
			
			</ul>
					
	</div>
	<div class="col-md-2 col-lg-2 col-xs-12 col-sm-12"></div>
							
</div>
		