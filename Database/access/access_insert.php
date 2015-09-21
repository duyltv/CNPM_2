<!-- 
 * THIS IS EXECUTE FILE, is used to insert to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_insert.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'access.php';
}
class Insert_ {
	/*
	 * Interface functions
	 */
	static function User($id,$name,$pass,$first_name,$last_name,$group,$meta) {
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
		return User_Insert($User_Object);
	}
	
	static function Article($id,$catagory_id,$title,$content,$status,$writter_id) {
		// Set arguments for object
		$Article_Object = new Article_();
		$Article_Object->$id = $id;
		$Article_Object->$catagory_id = $catagory_id;
		$Article_Object->$title = $title;
		$Article_Object->$content = $content;
		$Article_Object->$status = $status;
		$Article_Object->$writter_id = $writter_id;
		
		// Insert
		return Article_Insert($Article_Object);
	}
	
	static function Crop_Cat($id,$crop_category_name,$crop_category_title,$crop_category_parent) {
		// Set arguments for object
		$Crop_Cat_Object = new Crop_Cat_();
		$Crop_Cat_Object->$id = $id;
		$Crop_Cat_Object->$crop_category_name = $crop_category_name;
		$Crop_Cat_Object->$crop_category_title = $crop_category_title;
		$Crop_Cat_Object->$crop_category_parent = $crop_category_parent;
		
		// Update
		return Crop_Cat_Insert($Crop_Cat_Object);
	}
	
	static function Crop($id,$crop_name,$crop_title,$crop_description,$crop_category,$crop_status,$crop_author,$meta) {
		// Set arguments for object
		$Crop_Object = new Crop_();
		$Crop_Object->$id = $id;
		$Crop_Object->$crop_name = $crop_name;
		$Crop_Object->$crop_title = $crop_title;
		$Crop_Object->$crop_description = $crop_description;
		$Crop_Object->$crop_category = $crop_category;
		$Crop_Object->$crop_status = $crop_status;
		$Crop_Object->$crop_author = $crop_author;
		$Crop_Object->$meta = $meta;
		
		// Update
		return Crop_Insert($Crop_Object);
	}
	
	static function Catagory($id,$name,$parrent_id) {
		// Set arguments for object
		$Catagory_Object = new Catagory_();
		$Catagory_Object->$id = $id;
		$Catagory_Object->$name = $name;
		$Catagory_Object->$parrent_id = $parrent_id;
		
		// Insert
		return Catagory_Insert($Catagory_Object);
	}
	
	static function Files($id,$name,$url,$type_id,$typename) {
		// Set arguments for object
		$Files_Object = new Files_();
		$Files_Object->$id = $id;
		$Files_Object->$name = $name;
		$Files_Object->$url = $url;
		$Files_Object->$type_id = $type_id;
		$Files_Object->$typename = $typename;
		
		// Insert
		return Files_Insert($Files_Object);
	}
	
	/*
	 * Main functions
	 */
	// TODO: Insert user to table
	// Hai
	private function User_Insert($User_Object) {
		global $DB_Conn;
		
		$result = self::insert_users( $DB_Conn, $User_Object );
		
		$result	= self::insert_user_capability( $DB_Conn, $User_Object );

		$result	= self::insert_user_meta( $DB_Conn, $User_Object );

		return true; // True if success, False if not
	}
	
	// TODO: Insert article to table
	// Duc
	private function Article_Insert($Article_Object) {
		$sql = "SELECT id,catagory_id, title, writter_id FROM articles WHERE id =$Article_Object->id ";
		$result = $DB_Conn->query($sql);
		if ($result->num_rows > 0) 
			return false;
		else{
			$sql1 = "INSERT INTO articles(id,catagory_id,title,content	,status,writter_id)
			VALUES ($Article_Object->id,$Article_Object->catagory_id,$Article_Object->title,$Article_Object->content,$Article_Object->status,
				$Article_Object->writter_id)";

			if ($DB_Conn->query($sql1) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql1 . "<br>" . $DB_Conn->error;
			    return false;
			}
		}

		return true; // True if success, False if not
	}
	
	// TODO: Insert crop catagory to table
	// Chau
	private function Crop_Cat_Insert($Crop_Cat_Object) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Insert crop to table
	// Chau
	private function Crop_Insert($Crop_Object) {
		
		return true; // True if success, False if not
	}
	
	// TODO: Insert catagory to table
	// Duy
	private function Catagory_Insert($Catagory_Object) {
		$id = $Catagory_Object->id;
		$name = $Catagory_Object->name;
		$parrent_id = $Catagory_Object->parrent_id;
		
		$sql = "SELECT id FROM catagories WHERE id = '".$id"';";
		$result = $DB_Conn->query($sql);
		if ($result->num_rows > 0) 
			return false;
		
		$sql = "INSERT INTO catagories VALUES ('".$id."','".$name."','".$parrent_id."')"; // Query string
		$result = $DB_Conn->query($sql);
		return $result; // True if success, False if not
	}
	
	// TODO: Insert file to table
	// Chuong
	private function Files_Insert($Files_Object) {
		
		return true; // True if success, False if not
	}

	static function insert_users($DB_Conn, $User_Object) {
		$id = !empty($User_Object->id) ? $User_Object->id : '';
		$name = !empty($User_Object->name) ? $User_Object->name : '';
		$pass = !empty($User_Object->pass) ? $User_Object->pass : '';
		$group = !empty($User_Object->group) ? $User_Object->group : '';
		$first_name = !empty($User_Object->first_name) ? $User_Object->first_name : '';
		$last_name = !empty($User_Object->last_name) ? $User_Object->last_name : '';

		$stmt = $DB_Conn->prepare("INSERT INTO `users` VALUES (?,?,?,?,?,?)");
		$stmt->bind_param('ssssss',
				   $id,
				   $name,
				   $pass,
				   $group, 
				   $first_name,
				   $last_name);

		return $stmt->execute();
	}

	static function insert_user_capability($DB_Conn, $User_Object) {
		$id = !empty($User_Object->id) ? $User_Object->id : '';
		
		$capabilities = ($User_Object->capabilities);
		
		$stmt = $DB_Conn->prepare("INSERT INTO `user_capability` VALUES (?,?)");
		$stmt->bind_param('ss',
				   $id,
				   $capabilities);

		return $stmt->execute();	
	}

	static function insert_user_meta($DB_Conn, $User_Object) {
		$data = $User_Object->meta;
		$values = array();
		foreach ($data as $k => $v) {
			$values[] = sprintf("(%s,%s,%s)", $User_Object->id, $k, $v);
		}

		$values = implode(",", $values);

		$stmt = $DB_Conn->prepare("INSERT INTO `user_meta` VALUES (?)");
		$stmt->bind_param('s',
				   $values);

		return $stmt->execute();	
	}
}

?>