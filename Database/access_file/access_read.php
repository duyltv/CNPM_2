<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Minh Chuong
 * Date: Oct 18 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}

class Read_File {
	
	// TODO: Get Files_ by id
	// Chuong
	public function Files($id) {
		$files = new Files_();
		
		$sql = "SELECT id, name, url, type_id FROM files WHERE id=$id";
		$result = $DB_Conn->query($sql);
		
		$row = mysql_fetch_row($result);
		
		$files->$id = $row[0];
		$files->$name = $row[1];
		$files->$url = row[2];
		$files->$type_id = $row[3];
		
		$sql = "SELECT type_id, type_name FROM file_types WHERE type_id=$row[3]";
		$result = $DB_Conn->query($sql);
		
		$row = mysql_fetch_row($result);
		$files->$type_name = $row[1];
		
		return $files;
	}
}
?>