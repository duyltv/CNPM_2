<!-- 
 * THIS IS EXECUTE FILE, is used to delete from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_delete.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'access.php';
}
class Delete_ {
	
	// TODO: Delete User_ by id
	// Hai
	static function User($id) {
		global $DB_Conn;


		self::delete_banned( $DB_Conn, $id );
		self::delete_user_capability( $DB_Conn, $id );
		self::delete_user_meta( $DB_Conn, $id );
		self::delete_users( $DB_Conn, $id );

		return true; // True if success, False if not
	}

	static function delete_banned( $DB_Conn, $id ) {
		$stmt = $DB_Conn->prepare("DELETE FROM `banned` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
	}

	static function delete_user_capability( $DB_Conn, $id ) {
		$stmt = $DB_Conn->prepare("DELETE FROM `user_capability` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();	
	}

	static function delete_user_meta( $DB_Conn, $id ) {
		$stmt = $DB_Conn->prepare("DELETE FROM `user_meta` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
	}

	static function delete_users( $DB_Conn, $id ) {
		$stmt = $DB_Conn->prepare("DELETE FROM `users` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();	
	}
	
	// TODO: Delete Article by id
	// Duc
	static function Article($id) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Delete Crop by id
	// Chau
	static function Crop($id) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Delete Crop Catagory by id
	// Chau
	static function Crop_Cat($id) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Dlete Catagory by id
	// Duy
	static function Catagory($id) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Delete Files by id
	// Chuong
	static function Files($id) {
		
		return true; // True if success, False if not
	}
}
?>