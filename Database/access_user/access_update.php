<!-- 
 * THIS IS EXECUTE FILE, is used to update to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_update.php
 * Written: Thanh Hai
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Update_User {
	/*
	 * Interface functions
	 */
	public function User($id,$name,$pass,$first_name,$last_name,$banned,$group,$capabilities,$meta) {
		// Set arguments for object
		$User_Object = new User_();
		$User_Object->id = $id;
		$User_Object->name = $name;
		$User_Object->pass = $pass;
		$User_Object->first_name = $first_name;
		$User_Object->last_name = $last_name;
		$User_Object->banned = $banned;
		$User_Object->group = $group;
		$User_Object->capabilities = $capabilities;
		$User_Object->meta = $meta;
		
		// Update
		return $this->User_Update($User_Object);
	}
	
	/*
	 * Main functions
	 */
	// TODO: Update user to table
	// Hai
	public function User_Update($User_Object) {
		
		$result = self::update_users( $GLOBALS['DB_Conn'], $User_Object );
		
		if(!$result) return false;

		self::update_banned( $GLOBALS['DB_Conn'], $User_Object );
		self::update_user_capability( $GLOBALS['DB_Conn'], $User_Object );
		self::update_user_capability( $GLOBALS['DB_Conn'], $User_Object );
		self::update_user_meta( $GLOBALS['DB_Conn'], $User_Object );

		return true; // True if success, False if not
	}

	static function update_users( $DB_Conn, $User_Object ) {
		$id = !empty($User_Object->id) ? $User_Object->id : '';
		$pass = !empty($User_Object->pass) ? $User_Object->pass : '';
		$group = !empty($User_Object->group) ? $User_Object->group : '';
		$first_name = !empty($User_Object->first_name) ? $User_Object->first_name : '';
		$last_name = !empty($User_Object->last_name) ? $User_Object->last_name : '';

		$stmt = $GLOBALS['DB_Conn']->prepare("UPDATE `users` SET user_password = ?, 
		   groups = ?, 
		   first_name = ?,  
		   last_name = ?  
		   WHERE id = ?");
		$stmt->bind_param('sssss',
		   $pass,
		   $group,
		   $first_name,
		   $last_name, 
		   $id
		);
		return $stmt->execute();
	}

	static function update_banned( $DB_Conn, $User_Object ) {
		$banned = $User_Object->banned;
		$id = $User_Object->id;
		$tfrom = '';
		$tlong = '';
		if(!$banned) return;
		$stmt = $GLOBALS['DB_Conn']->prepare("INSERT INTO `banned` VALUES (?,?,?) ");
		$stmt->bind_param('sss',
		  	$id,
		  	$tfrom,
		  	$tlong
		);
		$stmt->execute();	
	}

	static function update_user_capability( $DB_Conn, $User_Object ) {
		$stmt = $GLOBALS['DB_Conn']->prepare("UPDATE `user_capability` SET capability_id = ?  
		   WHERE user_id = ?");
		$capabilities = $User_Object->capabilities;
		$stmt->bind_param('ss',
		   $capabilities, 
		   $id
		);
		return $stmt->execute();
	}

	static function update_user_meta( $DB_Conn, $User_Object ) {
		$meta = $User_Object->meta;
		$id = $User_Object->id;
		foreach ($meta as $meta_key => $meta_value) {
			$stmt = $GLOBALS['DB_Conn']->prepare("UPDATE `user_meta` SET meta_value = ?  
		   		WHERE user_id = ? AND meta_key = ?");

			$stmt->bind_param('sss',
			   $meta_value,
			   $id, 
			   $meta_key
			);
			$stmt->execute();
		}
	}
}

?>