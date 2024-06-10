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
					<center><img src="img/icon/addbank.png" class="avatar"/></center>
				
				</li>
				<li class="list-group-item">
						<div class="add-account mb-4">
						


<p style="display:none;" class="mt-1"><font style="color:green;"><i class="fa fa-default"></i> Add your </font> <font style="color:purple;"> Bank account details:</font></p>
<div id="LoginResult"></div>						
			
<script src="workitout.js"></script>	
<!--Adding Banking details--->
				
<form id="bankForm" autocomplete="off" method="POST">

<div class="text-right mb-1 mt-1">
<button id="updateBankdetails" class="btn btn-default"><i class="fa fa-send"></i> &nbsp;Add Bank</button>
</div>

<p class="textStyler mb-1 mt-1">Bank Name</p>
<select style="height:45px;" name="bankname" required="required" class="form-control">
<option value=""> Select Bank name .......</option>
<?php require_once("fetch_banks.php");?>
            </select>

<div class="row">
<div class="col-md-6">
	<p class="textStyler mb-1 mt-1">Account Name</p>
	<input type="text" id="acname" style="height:45px;" required="required" placeholder="Enter account name" name="acctname" value="<?php echo $_SESSION["TIMBOSS_CRYPTBUY_ACN"];?>" class="form-control ttx"/>
</div>
<div class="col-md-6">
	<p class="textStyler mb-1 mt-1">Account Number</p>
	<input type="text" id="acnumb" style="height:45px;" maxlength="10" required="required" placeholder="Enter account number" name="acctnum" value="<?php echo $_SESSION["TIMBOSS_CRYPTBUY_ACNUM"];?>" class="form-control ttx"/>
</div>
</div>




<input type="hidden" name="email" value="<?php echo $_SESSION["TIMBOSS_CRYPTBUY_EMAIL"];?>"/>
						       
<input type="hidden" name="bank_update" value="<?php echo sha1(rand());?>"/>
				<p class="mt-1">Note : Kindly provide account name that matches with profile name.</p>		       

</form>

				
				<!--Added bank account -->
				
				<div id="bankfetcher"></div>
						
						</div>
				</li>
				
			</ul>
			
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				

	</div>
						
</div>
		