<!-- 
 * THIS IS EXECUTE FILE, is used to delete from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_delete.php
 * Written: Minh Duc
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Delete_Article {
	
	// TODO: Delete Article by id
	// Duc
	public function Article($id) {
		$sql = "DELETE FROM articles WHERE id=$id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		if ($result === TRUE) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . $GLOBALS['DB_Conn']->error;
		    return false;
		}

		return true; // True if success, False if not
	}
}
?>