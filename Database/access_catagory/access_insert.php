<!-- 
 * THIS IS EXECUTE FILE, is used to insert to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_insert.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Insert_Catagory {
	/*
	 * Interface functions 2222
	 */
	
	public function Catagory($id,$name,$parrent_id) {
		// Set arguments for object
		$Catagory_Object = new Catagory_();
		$Catagory_Object->id = $id;
		$Catagory_Object->name = $name;
		$Catagory_Object->parrent_id = $parrent_id;
		
		// Insert
		return $this->Catagory_Insert($Catagory_Object);
	}
	
	
	// TODO: Insert catagory to table
	// Duy
	public function Catagory_Insert($Catagory_Object) {
		$id = $Catagory_Object->id;
		$name = $Catagory_Object->name;
		$parrent_id = $Catagory_Object->parrent_id;
		
		$sql = "SELECT id FROM catagories WHERE id = '".$id."';";
		$result = $GLOBALS['DB_Conn']->query($sql);
		if ($result->num_rows > 0) 
			return false;
		
		$sql = "INSERT INTO catagories VALUES ('".$id."','".$name."','".$parrent_id."')"; // Query string
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
}

?>