<!-- 
 * THIS IS EXECUTE FILE, is used to update to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_update.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Update_Catagory {
	/*
	 * Interface functions
	 */
	 
	
	public function Catagory($id,$name,$parrent_id) {
		// Set arguments for object
		$Catagory_Object = new Catagory_();
		$Catagory_Object->id = $id;
		$Catagory_Object->name = $name;
		$Catagory_Object->parrent_id = $parrent_id;
		
		// Update
		return $this->Catagory_Update($Catagory_Object);
	}
	
	// TODO: Update catagory to table
	// Duy
	public function Catagory_Update($Catagory_Object) {
		$id = $Catagory_Object->id;
		$name = $Catagory_Object->name;
		$parrent_id = $Catagory_Object->parrent_id;
		
		$sql = "UPDATE catagories SET name='".$name."',parrent_id='".$parrent_id."' WHERE id='".$id."';"; // Query string
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
}

?>