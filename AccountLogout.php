<?php
		session_start();
		unset($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_MOBILE"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_NAME"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_EMAIL"]);
		?>
		<script>
			window.location = "register";
		</script>
		<!-----script>
		setTimeout(function(){
			window.location = "register";
		},2000);
		</script>--->
		<?php
?>