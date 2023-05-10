<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['active_adminpage']="home";
$_SESSION['add_sts']="off"; // for add food page
include_once "../template/admin_header.php";
$db = new MyDatabase();
$sql = "SELECT * from tbl_food_list";
$db->doQuery($sql);
$size = $db->getNumRows();
$Data = $db->getAllRows();
//echo "Size : ".$size;
//echo "Status : ".$_SESSION['del_sts'];

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_GET['edit'])){
		$srlno = $_GET['edit'];
		echo "<br>Submit OK<br>srlno : ".$srlno;
		$f_name=$_POST['f_name'];
		$f_price=$_POST['f_price'];
		$avatar_path='../images/'.$_FILES['f_avatar']['name'];
	 	$test = $_FILES['f_avatar']['name'];
	  	echo "<br>Test : ".$test;
	  	if($test==""){
	  		$sql="UPDATE tbl_food_list set food_name='$f_name',food_price='$f_price' where srlno='$srlno' ";
		    	$db->doQuery($sql) or die("Error !");
		    	echo "<br>Updated without image";
		    	//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		    	//echo "Link : ".$actual_link;
		    	//$_SESSION['update_sts']="on";

	  	}
	  	else{
	  		$fileName = $_FILES['f_avatar']['tmp_name'];
		  	if(move_uploaded_file($fileName, $avatar_path)){
		    	//echo "<br>Upload Image";
		    	$sql="UPDATE tbl_food_list set food_name='$f_name',food_price='$f_price',food_image='$avatar_path' where srlno='$srlno' ";
		    	$db->doQuery($sql) or die("Error !");
		    	//$_SESSION['update_sts']="on";
		  }
	  	}
	  	//$_SESSION['update_sts']="on";
	  	//echo " IN Update : ".$_SESSION['update_sts'];
		header("location: http://localhost/restaurant/ui/admin_home.php");//Reload page
  	}

}

if(isset($_GET['del'])){
	$srlno = $_GET['del'];
	$sql = "DELETE from tbl_food_list where srlno='$srlno' ";
	$db->doQuery($sql) or die("Error !");
	
	header("location: http://localhost/restaurant/ui/admin_home.php");//Reload page
}

?>

<head></head>
<body>
<?php 
if($_SESSION['update_sts']=="on"){
	//echo "OK IN";
?>
	<div class="alert alert-success alert-dismissible fade in" style="text-align: center;">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>UPDATED !</strong> A food iteam is updated.
  	</div>
<?php
$_SESSION['update_sts']="off";
}
if($_SESSION['del_sts']=="on"){
?>
	<div class="alert alert-danger alert-dismissible fade in" style="text-align: center;">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>DELETED !</strong> A food iteam is removed.
  	</div>
<?php
$_SESSION['del_sts']="off";
}
?>
<h2 style="text-align: center;">WELCOME TO ADMIN PANEL</h2><br><br><br>
<h3 style="font-weight: bold;">#Edit a food</h3><br>
<div class="container">
	
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="form-group" style="margin-left: 370px;">
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Food Name" name="f_name" value="<?php if(isset($_GET['edit'])){ echo $_GET['f_name'];
        $_SESSION['update_sts']="on";  }?>"><br>
        <input type="text" class="form-control" placeholder="Food Price" name="f_price" value="<?php if(isset($_GET['edit'])) echo $_GET['f_price'];  ?>"><br>
        <input type="file" name="f_avatar" id="f_avatar" class="form-control" >
        <input type="submit" name="submit" value="Update" class="btn btn-success">
  	</div>
    </div>
	</form>
</div>
<br><br>
	<h3 style="font-weight: bold;">#Food List</h3>
	<table class="table">
		<tr class="success">
			<th>Food Details</th>
			<th>Food Image</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		for($i=0;$i<$size;$i++){
			$row = $Data[$i];
		?>
		<tr>
			<td><br>Food Name : <?php echo $row['food_name']; ?><br>
			Food Price : <?php echo $row['food_price'];  ?><br>
			</td>
			<td><img style="width: 150px;height: 100px;" src="<?php echo $row['food_image'];  ?>"></td>
			<td><br><a href="?edit=<?php echo $row['srlno'] ?>&f_name=<?php echo $row['food_name']; ?>&f_price=<?php echo $row['food_price']; ?>&f_image=<?php echo $row['food_image']; ?>" class="btn btn-info" style="width: 70px;">Edit</a></td>
			<td><br> <a href="?del=<?php echo $row['srlno'] ?>" class="btn btn-danger">Delete</a> </td>
		</tr>
		<?php
		}
		?>
	</table>


	
	<input type="hidden" name="" value="<?php if(isset($_GET['del'])){ $_SESSION['del_sts']="on";  }?>">

</body>