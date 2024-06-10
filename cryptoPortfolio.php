<script>
		let currentIndex = 0;
		const items = document.querySelectorAll('.carousel-cu-item');
		const totalItems = items.length;

		document.getElementById('nextButton-cu').addEventListener('click', function() {
			moveToNextItem();
		});

		document.getElementById('prevButton-cu').addEventListener('click', function() {
			moveToPreviousItem();
		});

		function moveToNextItem() {
			if (currentIndex < totalItems - 1) {
				currentIndex++;
			} else {
				currentIndex = 0;
			}
			updatecarousel();
		}

		function moveToPreviousItem() {
			if (currentIndex > 0) {
				currentIndex--;
			} else {
				currentIndex = totalItems - 1;
			}
			updatecarousel();
		}

		function updatecarousel() {
			const offset = -currentIndex * 100;
			document.querySelector('.carousel-cu-inner').style.transform = 'translateX(' + offset + '%)';
		}

</script>
		
		<div class="carousel-cu">
			<button id="prevButton-cu">&#10094;</button>
			<div class="carousel-cu-inner">

				<div class="carousel-cu-item" id="item1">
				
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
							<div class="panel panel-default">
								<div class="panel-body">
								
									<center><img src="img/crypto/btc.png" class="balance-classic"/></center>
									
									<p class="money-dex color-p"><?php echo number_format(x_getbalance("btc_wallet",$userid),8);?> BTC
									</p>
									<h5 class="money-title">BTC WALLET<span class="small-money"> ~ <?php echo sh_getdollarbal($userid , "btc");?></span></h5>
									
										
								</div>
							</div>
						</div>
				
				</div>
				
				<div class="carousel-cu-item" id="item2">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
							<div class="panel panel-default">
								<div class="panel-body">
								
									<center><img src="img/crypto/eth.png" class="balance-classic"/></center>
									
									<p class="money-dex color-g">
										<?php echo number_format(x_getbalance("eth_wallet",$userid),2);?> ETH
									</p>
									<h5  class="money-title">ETH WALLET<span class="small-money"> ~ <?php echo sh_getdollarbal($userid , "eth");?></span></h5>
									
								</div>
							</div>
						</div>
				</div>
				<div class="carousel-cu-item" id="item3">
				
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-up">
							<div class="panel panel-default">
								<div class="panel-body">
								
									<center><img src="img/crypto/usdt.png" class="balance-classic"/></center>
									
									<p class="money-dex color-p">
										<?php echo number_format(x_getbalance("usdt_wallet",$userid),2);?> USDT
									</p>
									<h5 class="money-title">USDT WALLET<span class="small-money"> ~ <?php echo sh_getdollarbal($userid , "usdt");?></span></h5>
									
								</div>
							</div>
						</div>
				
				</div>
			</div>
			<button id="nextButton-cu">&#10095;</button>
		</div>