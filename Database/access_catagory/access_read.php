<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 18 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}

class Read_Catagory {
	
	// TODO: Get Catagory_ by id
	// Duy
	public function Catagory($id) {
		$catagory = new Catagory_();
		$sql = "SELECT * FROM catagories;";
		$result = $GLOBALS['DB_Conn']->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc()
			$catagory->id = $row["id"];
			$catagories->name = $row["name"];
			$cata->parrent_id = $row["parrent_id"];
		}
		
		return $catagory;
	}
}
?>