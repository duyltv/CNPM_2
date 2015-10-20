<!-- 
 * THIS IS EXECUTE FILE, is used to insert to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_insert.php
 * Written: Thanh Hai
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Insert_User {
	/*
	 * Interface functions 2222
	 */
	public function User($id,$name,$pass,$first_name,$last_name,$group,$meta) {
		// Set arguments for object
		$User_Object = new User_();
		$User_Object->id = $id;
		$User_Object->name = $name;
		$User_Object->pass = $pass;
		$User_Object->first_name = $first_name;
		$User_Object->last_name = $last_name;
		$User_Object->banned = false;
		$User_Object->group = $group;
		$User_Object->capabilities = '00000000000000000000111';
		$User_Object->meta = $meta;
		
		// Insert
		return $this->User_Insert($User_Object);
	}
	
	/*
	 * Main functions
	 */
	// TODO: Insert user to table
	// Hai
	public function User_Insert($User_Object) {
		
		$result = self::insert_users( $DB_Conn, $User_Object );
		
		$result	= self::insert_user_capability( $DB_Conn, $User_Object );

		$result	= self::insert_user_meta( $DB_Conn, $User_Object );

		return true; // True if success, False if not
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

	public function insert_user_capability($DB_Conn, $User_Object) {
		$id = !empty($User_Object->id) ? $User_Object->id : '';
		
		$capabilities = ($User_Object->capabilities);
		
		$stmt = $GLOBALS['DB_Conn']->prepare("INSERT INTO `user_capability` VALUES (?,?)");
		$stmt->bind_param('ss',
				   $id,
				   $capabilities);

		return $stmt->execute();	
	}

	public function insert_user_meta($DB_Conn, $User_Object) {
		$data = $User_Object->meta;
		$values = array();
		foreach ($data as $k => $v) {
			$values[] = sprintf("(%s,%s,%s)", $User_Object->id, $k, $v);
		}

		$values = implode(",", $values);

		$stmt = $GLOBALS['DB_Conn']->prepare("INSERT INTO `user_meta` VALUES (?)");
		$stmt->bind_param('s',
				   $values);

		return $stmt->execute();	
	}
}

?>