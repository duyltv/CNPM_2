<!-- 
 * THIS IS EXECUTE FILE, is used to delete from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_delete.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Delete_ {
	
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
	
	// TODO: Delete Crop by id
	// Chau
	public function Crop($id) {
		$sql = "DELETE FROM crops WHERE id=$.id";// not sure if "id=$id" is correct or "id=.$id" O_o  i'm a little bit confused here (#1)
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
	
	// TODO: Delete Crop Catagory by id
	// Chau
	public function Crop_Cat($id) {
		$sql = "DELETE FROM crop_catagories WHERE id=$.id";//same as above  (same as (#1) )
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
	
	// TODO: Dlete Catagory by id
	// Duy
	public function Catagory($id) {
		$sql = "DELETE FROM catagories WHERE id='".$id."';"; // Query string
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		return $result; // True if success, False if not
	}
	
	// TODO: Delete Files by id
	// Chuong
	public function Files($id) {
		$sql = "DELETE FROM files WHERE id=".$id;
		
		return $DB_Conn->query($sql);
	}
}
?>