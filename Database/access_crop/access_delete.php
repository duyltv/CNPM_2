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
class Delete_Crop {
	
	// TODO: Delete Crop by id
	// Chau
	public function Crop($id) {
		$sql = "DELETE FROM crops WHERE id=$.id";// not sure if "id=$id" is correct or "id=.$id" O_o  i'm a little bit confused here (#1)
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
	
	// TODO: Delete Crop Catagory by id
	// Chau
	public function Crop_Cat($id) {
		$sql = "DELETE FROM crop_catagories WHERE id=$.id";//same as above  (same as (#1) )
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
}
?>