<!-- 
 * THIS IS EXECUTE FILE, is used to delete from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_delete.php
 * Written: Minh Chuong
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Delete_File {
	
	// TODO: Delete Files by id
	// Chuong
	public function Files($id) {
		$sql = "DELETE FROM files WHERE id=".$id;
		
		return $DB_Conn->query($sql);
	}
}
?>