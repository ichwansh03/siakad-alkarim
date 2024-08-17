<?php
class databaseConnection{
	public function __construct(){
		global $conn;
		$servername = "localhost";
		$dbname = "alkarim";
		$user = "root";
		$pw = "";
		$conn = mysqli_connect($servername,$user,$pw,$dbname);
		//check error
		if(!$conn){
			die("Database tidak terkoneksi: " . $conn->connect_error());
		}

	}
}

?>
