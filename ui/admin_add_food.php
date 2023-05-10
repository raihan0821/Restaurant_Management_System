<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['active_adminpage']="add_food";
$_SESSION['update_sts']="off";
$_SESSION['del_sts']="off";
include_once "../template/admin_header.php";
$db = new MyDatabase();

///WORK
if($_SERVER['REQUEST_METHOD']=='POST'){
	//echo "<br>Submit OK";
	$f_name=$_POST['f_name'];
	$f_price=$_POST['f_price'];
	$avatar_path='../images/'.$_FILES['f_avatar']['name'];
 	$test = $_FILES['f_avatar']['name'];
  	//echo "<br>".$test;
  	$fileName = $_FILES['f_avatar']['tmp_name'];
  	if(move_uploaded_file($fileName, $avatar_path)){
    	//echo "<br>Upload Image";
    	$sql="INSERT into tbl_food_list (food_name,food_price,food_image) values('$f_name','$f_price','$avatar_path') ";
    	$db->doQuery($sql) or die("Error !");
  }
}

?>

<head></head>
<body>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
?>
	<div class="alert alert-success alert-dismissible fade in" style="text-align: center;">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Success!</strong> A new food iteam is added.
  	</div>
<?php
  }
?>
	<br><br><br><br>
	<h2 style="text-align: center;">Add a new food</h2><br><br>
	<div class="container">
  	<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-4" for="f_name" >Food Name : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="f_name" placeholder="Enter food name" name="f_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="f_price" >Food Price : </label>
      <div class="col-sm-5">          
        <input type="text" class="form-control" id="f_price" placeholder="Enter food price" name="f_price">
      </div>
    </div>
    <div class="form-group">

    	<label class="control-label col-sm-4" for="f_avatar">Food Image : </label>
    	<div  class="col-sm-5">
     		<input type="file" name="f_avatar" id="f_avatar" class="form-control">
  		</div>
 	</div>
    <div class="form-group" ">        
      <div class="col-md-offset-4 col-sm-5" >
        <button type="submit" class="btn btn-success">Add food</button>
      </div>
    </div>

    
  </form>
</div>
		




	</form>
</body>