<div class="fund-account">

	<div class="container-fluid">

		<div class="row">
				<div class="col-md-2 col-lg-2 col-xs-12 col-sm-12"></div>
				<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
				
					<h4><i class="fa fa-arrow-left close-funding"></i> &nbsp;&nbsp;FIAT <span class="color-p"></span>FUNDING</h4>
				
				</div>
				<div class="col-md-2 col-lg-2 col-xs-12 col-sm-12"></div>
		</div>
		
	</div>
	
</div>

<style>

</style>

<script>

	$(document).ready(function(){
		
		manageDivs(".initiate-funding" , ".fund-account" , ".close-funding");
		manageDivs(".initiate-buying" , ".buy-assets" , ".close-buying");
		manageDivs(".initiate-selling" , ".sell-assets" , ".close-selling");
	
	});
	
	function manageDivs(openSelector , Content , closeSelector){
		
		$(openSelector).click(function(){
			
			$(Content).show(300);
			
		});	
		
		$(closeSelector).click(function(){
			
			$(Content).hide(300);
			
		});
	}
	
</script>