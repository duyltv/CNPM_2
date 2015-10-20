<!-- 
 * THIS IS EXECUTE FILE, is used to insert to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_insert.php
 * Written: Minh Chuong
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Insert_File {
	/*
	 * Interface functions 2222
	 */
	
	public function Files($id,$name,$url,$type_id,$typename) {
		// Set arguments for object
		$Files_Object = new Files_();
		$Files_Object->id = $id;
		$Files_Object->name = $name;
		$Files_Object->url = $url;
		$Files_Object->type_id = $type_id;
		$Files_Object->typename = $typename;
		
		// Insert
		return $this->Files_Insert($Files_Object);
	}
	
	/*
	 * Main functions
	 */
	
	// TODO: Insert file to table
	// Chuong
	public function Files_Insert($Files_Object) {
		$sql = "INSERT INTO files (id,name, url, type_id) VALUES ('".$File_Object->$id."','".$File_Object->$name."','".$File_Object->$url."','".$File_Object->$type_id."')";
	
		return $conn->query($sql);
	}

	public function insert_users($DB_Conn, $User_Object) {
		$id = !empty($User_Object->id) ? $User_Object->id : '';
		$name = !empty($User_Object->name) ? $User_Object->name : '';
		$pass = !empty($User_Object->pass) ? $User_Object->pass : '';
		$group = !empty($User_Object->group) ? $User_Object->group : '';
		$first_name = !empty($User_Object->first_name) ? $User_Object->first_name : '';
		$last_name = !empty($User_Object->last_name) ? $User_Object->last_name : '';

		$stmt = $GLOBALS['DB_Conn']->prepare("INSERT INTO `users` VALUES (?,?,?,?,?,?)");
		$stmt->bind_param('ssssss',
				   $id,
				   $name,
				   $pass,
				   $group, 
				   $first_name,
				   $last_name);

		return $stmt->execute();
	}
}

?>