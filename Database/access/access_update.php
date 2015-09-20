<!-- 
 * THIS IS EXECUTE FILE, is used to update to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_update.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->
 
 
 <?php

class Update_ {
	/*
	 * Interface functions
	 */
	static function User($id,$name,$pass,$appearname,$banned,$group,$roles) {
		// Set arguments for object
		$User_Object = new User_();
		$User_Object->$id = $id;
		$User_Object->$name = $name;
		$User_Object->$pass = $pass;
		$User_Object->$appearname = $appearname;
		$User_Object->$banned = $banned;
		$User_Object->$group = $group;
		$User_Object->$roles = $roles;
		
		// Update
		return User_Update($User_Object);
	}
	
	static function Article($id,$catagory_id,$subject,$content,$writter_id) {
		// Set arguments for object
		$Article_Object = new Article_();
		$Article_Object->$id = $id;
		$Article_Object->$catagory_id = $catagory_id;
		$Article_Object->$subject = $subject;
		$Article_Object->$content = $content;
		$Article_Object->$writter_id = $writter_id;
		
		// Update
		return Article_Update($Article_Object);
	}
	
	static function Catagory($id,$name,$parrent_id) {
		// Set arguments for object
		$Catagory_Object = new Catagory_();
		$Catagory_Object->$id = $id;
		$Catagory_Object->$name = $name;
		$Catagory_Object->$parrent_id = $parrent_id;
		
		// Update
		return Catagory_Update($Catagory_Object);
	}
	
	static function Files($id,$name,$url,$type_id,$typename) {
		// Set arguments for object
		$Files_Object = new Files_();
		$Files_Object->$id = $id;
		$Files_Object->$name = $name;
		$Files_Object->$url = $url;
		$Files_Object->$type_id = $type_id;
		$Files_Object->$typename = $typename;
		
		// Update
		return Files_Update($Files_Object);
	}
	
	/*
	 * Main functions
	 */
	// TODO: Update user to table
	// Duc
	private function User_Update($User_Object) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Update article to table
	// Chuong
	private function Article_Update($Article_Object) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Update catagory to table
	// Chau
	private function Catagory_Update($Catagory_Object) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Update file to table
	// Hai
	private function Files_Update($Files_Object) {
		
		return true; // True if success, False if not
	}
}

?>