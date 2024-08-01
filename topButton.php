	<div style="padding-left:0pt" class="btn-group mt-0 mb-1">
	
			<button style="padding:10px;font-size:9pt;" id="cryptoPortfolio" type="button" class="btn btn-success"><i class="fa fa-bitcoin"></i>&nbsp;&nbsp;&nbsp; Crypto Portfolio</button>

			<button style="padding:10px;font-size:9pt;" id="fiatPortfolio" type="button" class="btn btn-primary"><i class="fa fa-bank"></i>&nbsp;&nbsp;&nbsp; Fiat Portfolio</button>
	</div>
	
	<script>
		$(document).ready(function(){
			
			$("#cryptoPortfolio").click(function(){
				$(".carousel-cu").show(500);
				$(".carousel-cuu").hide(500);
				$("#cryptoPortfolio").attr("disabled","disabled");
				$("#fiatPortfolio").removeAttr("disabled");
			});
			
			$("#fiatPortfolio").click(function(){
				$(".carousel-cu").hide(500);
				$(".carousel-cuu").show(500);
				$("#fiatPortfolio").attr("disabled","disabled");
				$("#cryptoPortfolio").removeAttr("disabled");
			});
			
			$("#cryptoPortfolio").attr("disabled","disabled");
		});
	</script>