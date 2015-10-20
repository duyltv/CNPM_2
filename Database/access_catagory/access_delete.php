<!-- 
 * THIS IS EXECUTE FILE, is used to delete from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_delete.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Delete_Catagory {
	
	// TODO: Dlete Catagory by id
	// Duy
	public function Catagory($id) {
		$sql = "DELETE FROM catagories WHERE id='".$id."';"; // Query string
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		return $result; // True if success, False if not
	}
}
?>