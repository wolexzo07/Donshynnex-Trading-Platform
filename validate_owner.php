<?php
	$uid = $_SESSION["TIMBOSS_CRYPTBUY_ID"];
	
	if(sh_adminchecker($uid) == "0"){
		?><script>
			load('homedash');
			</script><?php
	}
?>