<?php
include("../justlibrary/finishit.php");
$content = "bitcoin:19UWSCDrLQGzFSTe44V8damHDxPXvBuzwf?amount=0.03585509&amp;label=Payment";
$path_validation = 1;
$path = "qrcoder/".sha1(uniqid()).".png";
x_qrcode($content,$path,$path_validation);
?>
<img src="<?php echo $path;?>"/>