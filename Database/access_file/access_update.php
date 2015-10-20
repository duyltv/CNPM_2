<!-- 
 * THIS IS EXECUTE FILE, is used to update to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_update.php
 * Written: Minh Chuong
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Update_File {
	/*
	 * Interface functions
	 */
	
	public function Files($id,$name,$url,$type_id) {
		// Set arguments for object
		$Files_Object = new Files_();
		$Files_Object->id = $id;
		$Files_Object->name = $name;
		$Files_Object->url = $url;
		$Files_Object->type_id = $type_id;
		$Files_Object->typename = '';
		
		// Update
		return $this->Files_Update($Files_Object);
	}
	
	/*
	 * Main functions
	 */
	// TODO: Update file to table
	// Chuong
	public function Files_Update($Files_Object) {
		$sql = "UPDATE files SET name = $Files_Object->$name, url='$Files_Object->$url', type_id = $Files_Object->$type_id WHERE id=$Files_Object->$id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
	}
}

?>