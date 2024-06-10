<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user
?>
<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<script src="workitout.js"></script>
		<ul class="list-group mt-1">
		<li class="list-group-item">
					<center><img src="img/icon/admin.png" class="avatar"/></center>
					</li>
			<li style="" class="list-group-item">
			<div class="btn-group btn-group-sm">
					  <span onclick="load('justme')" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></span>
					  <span onclick="load('Track_Payments')" type="button" id="payoff" class="btn btn-success"><i class="fa fa-refresh"></i></span>	
			</div>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-credit-card"></i> &nbsp;&nbsp;Track Payments</b>
			</li>
			
			<li class="list-group-item">
				<div id="TrackPayment1"></div>
				<div id="TrackPayment"></div>
				
				<div class="btn-group btn-group-sm">
					  <span onclick="load('justme')" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></span>
					  <span onclick="load('Track_Payments')" type="button" id="payoff" class="btn btn-success"><i class="fa fa-refresh"></i></span>	
				</div>
			</li>
			

				
			
	</ul>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
		</div>
				
	<!---<h4 class="headerText"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp; BTC <font style="color:purple;">CURRENT RATES</font></h4>--->
		

	</div>
	

							
</div>
		