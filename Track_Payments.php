<?php 
session_start();
include("../justlibrary/finishit.php");
include("../justlibrary/cryptabuyExtension.php");
include("validate_owner.php"); // Authenticating super user
?>
<script src="workitout.js"></script>	

<div class="row">
						
	<div class="col-md-12">
	
		<div class="row">			
			<!--<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>--->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<ul class="list-group mt-1">
						<!--<li class="list-group-item">
									<center><img src="img/icon/admin.png" class="avatar"/></center>
						</li>--->
						<li style="" class="list-group-item">
							<div class="btn-group btn-group-sm">
									  <span onclick="load('justme')" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></span>
									  <span onclick="load('Track_Payments')" type="button" id="payoff" class="btn btn-success"><i class="fa fa-refresh"></i></span>	
							</div><span class="f-bold t-u ft-12">Track <span class="color-g">Payments</span></span>
						</li>
						
						<li class="list-group-item">
							<div id="TrackPayment1"></div>
							<div id="TrackPayment"></div>
							
							<!---<div class="btn-group btn-group-sm d-none">
								  <span onclick="load('justme')" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></span>
								  <span onclick="load('Track_Payments')" type="button" id="payoff" class="btn btn-success"><i class="fa fa-refresh"></i></span>	
							</div>--->
							
						</li>
						

							
						
				</ul>
			
			</div>
			<!--<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12"></div>--->
		</div>
				
	</div>
	

							
</div>
		