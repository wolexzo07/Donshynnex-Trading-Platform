<script>
		let currentIndex = 0;
		const items = document.querySelectorAll('.carousel-cuu-item');
		const totalItems = items.length;

		document.getElementById('nextButton-cuu').addEventListener('click', function() {
			moveToNextItemm();
		});

		document.getElementById('prevButton-cuu').addEventListener('click', function() {
			moveToPreviousItemm();
		});

		function moveToNextItemm() {
			if (currentIndex < totalItems - 1) {
				currentIndex++;
			} else {
				currentIndex = 0;
			}
			updatecarousell();
		}

		function moveToPreviousItemm() {
			if (currentIndex > 0) {
				currentIndex--;
			} else {
				currentIndex = totalItems - 1;
			}
			updatecarousell();
		}

		function updatecarousell() {
			const offset = -currentIndex * 100;
			document.querySelector('.carousel-cuu-inner').style.transform = 'translateX(' + offset + '%)';
		}

</script>

		<div style="display:none;" class="carousel-cuu">
			<button id="prevButton-cuu">&#10094;</button>
			<div class="carousel-cuu-inner">
				<div class="carousel-cuu-item" id="item1">
				
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
						<div class="panel panel-default">
							<div class="panel-body">
							
								<center><img src="img/country/NGN.png" class="balance-classic"/></center>
							
								<p class="money-dex color-p"><?php echo "NGN ".number_format(x_getbalance("naira_wallet",$userid),2);?></p>
								<h5 class="money-title">NGN WALLET</h5>
							</div>
						</div>
					</div>
				
				</div>
				<div class="carousel-cuu-item" id="item2">
				
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
							<div class="panel panel-default">
								<div class="panel-body">
								
									<center><img src="img/country/GHS.png" class="balance-classic"/></center>
								
									<p class="money-dex color-g"><?php echo "GHS ".number_format(x_getbalance("cedis_wallet",$userid),2);?></p>
									<h5 class="money-title">GHS WALLET</h5>
								</div>
							</div>
						</div>
				
				</div>
				<div class="carousel-cuu-item" id="item3">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
							<div class="panel panel-default">
								<div class="panel-body">
									
									<center><img src="img/country/KSH.png" class="balance-classic"/></center>
									
									<p class="money-dex color-p"><?php echo "KSH ".number_format(x_getbalance("cephas_wallet",$userid),2);?></p>
									<h5  class="money-title">KSH WALLET</span></h5>
									
								</div>
							</div>
						</div>
				</div>

			</div>
			<button id="nextButton-cuu">&#10095;</button>
		</div>