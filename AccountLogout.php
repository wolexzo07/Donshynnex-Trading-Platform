<?php
		session_start();
		unset($_SESSION["TIMBOSS_CRYPTBUY_ID"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_MOBILE"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_NAME"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_EMAIL"]);

		unset($_SESSION["TIMBOSS_CRYPTBUY_TOKEN"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_PATH"]);
		
		// Banking account details
		
		unset($_SESSION["TIMBOSS_CRYPTBUY_BKN"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_ACN"]);
		unset($_SESSION["TIMBOSS_CRYPTBUY_ACNUM"]);
		
		?>
		<script>
			window.location = "register";
		</script>
		<?php
?>