<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Thanh Hai
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}

class Read_User {
	
	// TODO: Group type. Return a string what is user's group (Declared in types.php)
	// Hai
	public function get_capabilities_group($DB_Conn, $group) {
		$sql = sprintf("SELECT * FROM `groups` WHERE name = %s", $group);
		$result = $GLOBALS['DB_Conn']->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        return $row['capabilities'];
		    }
		}
	}

	public function get_user_meta( $DB_Conn, $id ) {
		$sql = sprintf("SELECT * FROM `user_meta` WHERE user_id = %d", $id);
		$result = $GLOBALS['DB_Conn']->query($sql);

		$meta = array();
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		    	$meta[$row['meta_key']] = $row['meta_value'];   
		    }
		}

		return $meta;
	}
	
	// TODO: Capability types. Return a string what is user's capability (Declared in types.php)
	// Hai
	public function get_capabilities($DB_Conn, $id) {
		$sql = sprintf("SELECT * FROM `user_capability` WHERE user_id = %d", $id);
		$result = $GLOBALS['DB_Conn']->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        return $row['capabilities'];
		    }
		}
	}
	
	// TODO: Get User_ by id
	// Hai
	public function User($id) {
		
		$sql = sprintf("SELECT * FROM `users` WHERE id = %d", $id);
		$result = $GLOBALS['DB_Conn']->query($sql);

		$user = new User_();
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        $user->id = $row["id"];
		        $user->name = $row["user_name"];
		        $user->pass = $row["user_pass"];
		        $user->first_name = $row["first_name"];
		        $user->last_name = $row["last_name"];
		        $user->group = $row["groups"];
		    }
		}

		$caps_group = self::get_capabilities_group( $GLOBALS['DB_Conn'], $id );
		$caps = self::get_capabilities( $GLOBALS['DB_Conn'], $id );

		$user->capabilities = (intval($caps_group) > intval($caps)) ? $caps_group : $caps;

		$user->meta = self::get_user_meta( $GLOBALS['DB_Conn'], $id );

		return $user;
	}
	
	// TODO: Get User_(s) by name. Return users have $string in $name
	// Hai
	public function User_by_name($string) {
		$users = new array(); // User_ array
		
		return $users;
	}
}
?>