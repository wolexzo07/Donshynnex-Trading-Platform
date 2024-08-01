<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user
?>

<script src="extra.js"></script>
<script src="workitout.js"></script>

<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<ul class="list-group mt-1">
						
						<li style="" class="list-group-item">
						
							<div class="btn-group btn-group-sm">
							
								  <span onclick="load('justme')" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></span>
								  
								  <span onclick="load('manageWallets')" type="button" id="payoff" class="btn btn-success"><i class="fa fa-refresh"></i></span>	
								  
							</div>
							
							<span class="f-bold t-u ft-12">MANAGE <span class="color-g">ADMIN WALLET</span></span>
							
						</li>
						
						<li class="list-group-item">
						
								<form id="addWallet">
								
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										
										<p class="mt-1 mb-1">ADD NGN BANK</p>
										
										<select class="form-control" required="" style="height:45px;" name="bankname">
											<option value=""> Select Bank name .......</option>
											<?php require_once("fetch_banks.php");?>
										</select>
										
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2 mb-1">
												<p class="mb-1 mt-1 d-none">Account Name</p>
												<input type="text" id="acname" style="height:45px;" required="required" placeholder="Enter account name" name="acctname"  class="form-control ttx"/>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2 mb-1">
												<p class="mb-1 mt-1 d-none">Account Number</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter account number" name="acctnum" class="form-control ttx"/>
											</div>
										</div>
										
										<p class="mt-1 mb-1">ADD CRYPTO ADDRESS</p>
										
										<div class="row">
										
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Bitcoin Address</p>
												<input type="text" id="bitc" style="height:45px;" required="required" placeholder="Enter bitcoin address" name="btc"  class="form-control ttx"/>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Ethereum Address</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter ethereum address" name="eth" class="form-control ttx"/>
											</div>
											
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">USDT Address</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter usdt address" name="usdt" class="form-control ttx"/>
											</div>
										</div>
										
										<p class="mt-1 mb-1">ADD GHS BANK</p>
										
										<div class="row">
										
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Momo Name</p>
												<input type="text" id="bitc" style="height:45px;" required="required" placeholder="Enter momo name" name="mname"  class="form-control ttx"/>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Momo number</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter momo number" name="mnumb" class="form-control ttx"/>
											</div>
											
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Momo ID</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter momo id" name="mid" class="form-control ttx"/>
											</div>
										</div>
										
										<p class="mt-1 mb-1">ADD KSH BANK</p>
										
										<div class="row">
										
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Bank Name</p>
												<input type="text" id="bitc" style="height:45px;" required="required" placeholder="Enter bank name" name="kbname"  class="form-control ttx"/>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Account name</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter account name" name="kacname" class="form-control ttx"/>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<p class="mb-1 mt-1 d-none">Account number</p>
												<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter account number" name="knumb" class="form-control ttx"/>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1 mb-1">
												<button class="btn btn-primary w-100 btn-lg">Update</button>
											</div>
											
										</div>
										
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
									</div>
	
								</form>
								
								<div id="readWallet"></div>

						</li>
						

							
						
				</ul>
			
			</div>
			
		</div>
				
	</div>
	

							
</div>

<script>
	$(document).ready(function(){
		
		x_formpro("#addWallet","#readWallet","add-wallet","timboss");
		
	});
</script>