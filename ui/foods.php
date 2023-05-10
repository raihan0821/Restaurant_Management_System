<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['active_page']="foods";
include_once "../template/header.php";
$db = new MyDatabase();
$sql = "SELECT * from tbl_food_list";
$db->doQuery($sql);
$size = $db->getNumRows();
$Data = $db->getAllRows();
//echo "Size : ".$size;

?>

<head></head>
<body>
	
 <div class="row">
  <?php 
  for($i=0;$i<$size;$i++){
      $row = $Data[$i];
    ?>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="<?php echo $row['food_image'];  ?>" >
        <img src="<?php echo $row['food_image'];  ?>" style="width:340px;height: 300px">
        <div class="caption" style="text-align: center;">
          <p>Food Name : <?php echo $row['food_name'];  ?></p>
          <p>Price : BDT. <?php echo $row['food_price'];  ?> (VAT Included)</p>
        </div>
      </a>
    </div>
  </div>

  <?php
    }
    ?>
  
</div>



</body>