<?php

include_once "../template/resourcesFile.php";
include_once "../util/util.php";
//echo("<br>Header : ".$_SESSION['active_page']);


?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="http://localhost/restaurant/ui/admin_home.php">Mr. Cheese Restaurant</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li <?php if($_SESSION['active_adminpage']=="home"){?> class="active" <?php } ?> ><a href="http://localhost/restaurant/ui/admin_home.php">Home</a></li>
	      <li <?php if($_SESSION['active_adminpage']=="add_food"){?> class="active" <?php } ?> ><a  href="http://localhost/restaurant/ui/admin_add_food.php">Add Food</a></li>
	      
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li <?php if($_SESSION['active_adminpage']=="logout"){?> class="active" <?php } ?>  ><a href="http://localhost/restaurant/ui/home_page.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
	    </ul>
	  </div>
	</nav>



</body>
