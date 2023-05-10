<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['active_page']="login";
$_SESSION['update_sts']="off";//for admin panel
$_SESSION['del_sts']="off";//for admin panel
include_once "../template/header.php";


if($_SERVER['REQUEST_METHOD']=='POST'){
	//echo "IN<br>";
	$userName=$_POST['email'];
	$pa=$_POST['password'];
	//echo "E : ".$userName." P : ".$pa;
	if($userName=="admin@gmail.com" && $pa=="admin"){
		//echo "OK";
		header("location: http://localhost/restaurant/ui/admin_home.php");
	}


}

?>

<head></head>
<body>

<div class="container">
	<div style="float: left;">
  <img src="../images/mr_cheese2.jpg" ></div>
  <form class="form-horizontal" method="post" style="float: right;padding-right: 200px;width: 550px;"><br><br><br><br><br>
  	<h1 style="text-align: center;color: black;">Log in</h2>
    <div class="form-group">
      <label class="control-label " for="email" style="color: black;">Email</label>
      <div class="col-sm-15">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label " for="pwd" style="color: black;">Password</label>
      <div class="col-sm-15">          
        <input type="password" class="form-control"  id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    
    <div class="form-group" ">        
      <div class="col-sm-offset-4 col-sm-16" >
        <button type="submit" class="btn btn-success">login</button>
      </div>
    </div>
  </form>
</div>
</body>