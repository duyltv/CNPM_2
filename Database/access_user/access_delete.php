<!-- 
 * THIS IS EXECUTE FILE, is used to delete from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_delete.php
 * Written: Thanh Hai
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Delete_User {
	
	// TODO: Delete User_ by id
	// Hai
	public function User($id) {

		self::delete_banned( $DB_Conn, $id );
		self::delete_user_capability( $DB_Conn, $id );
		self::delete_user_meta( $DB_Conn, $id );
		self::delete_users( $DB_Conn, $id );

		return true; // True if success, False if not
	}

	public function delete_banned( $DB_Conn, $id ) {
		$stmt = $GLOBALS['DB_Conn']->prepare("DELETE FROM `banned` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
	}

	public function delete_user_capability( $DB_Conn, $id ) {
		$stmt = $GLOBALS['DB_Conn']->prepare("DELETE FROM `user_capability` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();	
	}

	public function delete_user_meta( $DB_Conn, $id ) {
		$stmt = $GLOBALS['DB_Conn']->prepare("DELETE FROM `user_meta` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
	}

	public function delete_users( $DB_Conn, $id ) {
		$stmt = $GLOBALS['DB_Conn']->prepare("DELETE FROM `users` WHERE user_id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();	
	}
}
?>