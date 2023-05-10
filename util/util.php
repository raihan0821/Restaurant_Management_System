<?php
	

?>

<?php 
class MyDatabase{
	public $host = "localhost";
	public $userName = "root";
	public $password = "";
	public $bdName = "restaurant";

	public $_con;
	public $_result;
	public $error;

	public function __construct(){
		$this->_con = new mysqli($this->host,$this->userName,$this->password,$this->bdName);
		if(!$this->_con){
			$this->error = "Connection Fail ! Please Fix it.....";
			echo $this->error;
		}
	}
	public function doQuery($sql) {

		$this->_result = $this->_con->query($sql) or die("Error! ".$sql);		
		return $this->_result;
		echo "Success";

	}
	
	// Return the number of rows
	public function getNumRows() {
		$this->_numRows = mysqli_num_rows($this->_result);
		return $this->_numRows;
	}
	
	// Fetches all the rows and return them as one array(array())
	public function getAllRows() {
		$rows = array();
		
		for($x = 0; $x < $this->getNumRows(); $x++) {
			$rows[] = mysqli_fetch_assoc($this->_result);
		}
		return $rows;
	}
	// fetch the top row from the result
	public function getTopRow() {
		return $this->_result->fetch_array();
	}

	public function secureInput($value) {
		$value=trim($value);
		return mysqli_real_escape_string($this->_con, $value);
	}

	/*public function doQuery($sql){
		$result = $this->con->query($sql) or die("Error! ".$sql);

		$numRows = mysqli_num_rows($result) or die(0);
		//echo "Size : ".$numRows;
		if($numRows==0){
			$result = mysqli_fetch_array($result);
			return $result;
		}
		else
		{
			$resultArray = array();
			$i=0;
			for($i = 0 ; $i < $numRows ; $i++){
				$resultArray[] = mysqli_fetch_assoc($result);
			}

			return $resultArray; 
		}
		//echo "<br>Success<br>Size : ".$numRows;
	}*/
 
}
?>
