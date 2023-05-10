<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['active_page']="home";
include_once "../template/header.php";

//
?>
<head></head>
<body style="background-image: url(../images/mr_cheese.jpg);background-size: cover;">
	<marquee direction="left" style="color: black;font-size: 30px;font-weight: bold;">WELCOME TO OUR FOOD WORLD</marquee>

</body>