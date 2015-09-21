<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'access.php';
}

class Read_ {
	
	// TODO: Group type. Return a string what is user's group (Declared in types.php)
	// Hai
	static function get_capabilities_group($DB_Conn, $group) {
		$sql = sprintf("SELECT * FROM `groups` WHERE name = %s", $group);
		$result = $DB_Conn->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        return $row['capabilities'];
		    }
		}
	}

	static function get_user_meta( $DB_Conn, $id ) {
		$sql = sprintf("SELECT * FROM `user_meta` WHERE user_id = %d", $id);
		$result = $DB_Conn->query($sql);

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
	static function get_capabilities($DB_Conn, $id) {
		$sql = sprintf("SELECT * FROM `user_capability` WHERE user_id = %d", $id);
		$result = $DB_Conn->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        return $row['capabilities'];
		    }
		}
	}
	
	// TODO: Get User_ by id
	// Hai
	static function User($id) {
		global $DB_Conn;
		
		$sql = sprintf("SELECT * FROM `users` WHERE id = %d", $id);
		$result = $DB_Conn->query($sql);

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

		$caps_group = self::get_capabilities_group( $DB_Conn, $id );
		$caps = self::get_capabilities( $DB_Conn, $id );

		$user->capabilities = (intval($caps_group) > intval($caps)) ? $caps_group : $caps;

		$user->meta = self::get_user_meta( $DB_Conn, $id );

		return $user;
	}
	
	// TODO: Get User_(s) by name. Return users have $string in $name
	// Hai
	static function User_by_name($string) {
		$users = new array(); // User_ array
		
		return $users;
	}
	
	// TODO: Get Crop by id
	// Chau
	static function Crop($id) {
		$crop = new Crop_();
		
		return true; // True if success, False if not
	}
	
	// TODO: Get Crop by string in name
	// This means if a crop has it's name includes a string, then add this crop to the array then return array.
	// Chau
	static function Crop($string) {
		$crop = new array();
		
		return true; // True if success, False if not
	}
	
	// TODO: Get Crop Catagory by id
	// Chau
	static function Crop_Cat($id) {
		$crop_cat = new Crop_Cat_();
		
		return true; // True if success, False if not
	}
	
	// TODO: Get Article_ by id
	// Duc
	static function Article($id) {
		$article = new Article_();
		
		return $article;
	}
	
	// TODO: Get Article_(s) by name. Return articles have $string in $name
	// 
	static function Article_by_name($string) {
		$articles = new array(); // Article_ array
		
		return $articles;
	}
	
	// TODO: Get Article_(s) by content. Return articles have $string in $content
	// 
	static function Article_by_content($string) {
		$articles = new array(); // Article_ array
		
		return $articles;
	}
	
	// TODO: Get Catagory_ by id
	// Duy
	static function Catagory($id) {
		$catagory = new Catagory_();
		
		return $catagory;
	}
	
	// TODO: Get Files_ by id
	// Chuong
	static function Files($id) {
		$files = new Files_();
		
		return $files;
	}
}
?>