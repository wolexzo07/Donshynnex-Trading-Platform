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
								  
								  <span onclick="load('allPayments')" type="button" id="payoff" class="btn btn-success"><i class="fa fa-refresh"></i></span>	
								  
							</div>
							
							<span class="f-bold t-u ft-12">Treated <span class="color-g">Top-ups</span></span>
							
						</li>
						
						<li class="list-group-item">
						
							<div id="allPayment"></div>

						</li>
						

							
						
				</ul>
			
			</div>
			
		</div>
				
	</div>
	

							
</div>
		