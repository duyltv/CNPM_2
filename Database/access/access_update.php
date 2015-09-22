<!-- 
 * THIS IS EXECUTE FILE, is used to update to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_update.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Update_ {
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
	
	public function Article($id,$catagory_id,$title,$content,$status,$writter_id) {
		// Set arguments for object
		$Article_Object = new Article_();
		$Article_Object->id = $id;
		$Article_Object->catagory_id = $catagory_id;
		$Article_Object->title = $title;
		$Article_Object->content = $content;
		$Article_Object->status = $status;
		$Article_Object->writter_id = $writter_id;
		
		// Update
		return $this->Article_Update($Article_Object);
	}
	
	public function Crop_Cat($id,$crop_category_name,$crop_category_title,$crop_category_parent) {
		// Set arguments for object
		$Crop_Cat_Object = new Crop_Cat_();
		$Crop_Cat_Object->id = $id;
		$Crop_Cat_Object->crop_category_name = $crop_category_name;
		$Crop_Cat_Object->crop_category_title = $crop_category_title;
		$Crop_Cat_Object->crop_category_parent = $crop_category_parent;
		
		// Update
		return $this->Crop_Cat_Update($Crop_Cat_Object);
	}
	
	public function Crop($id,$crop_name,$crop_title,$crop_description,$crop_category,$crop_status,$crop_author,$meta) {
		// Set arguments for object
		$Crop_Object = new Crop_();
		$Crop_Object->id = $id;
		$Crop_Object->crop_name = $crop_name;
		$Crop_Object->crop_title = $crop_title;
		$Crop_Object->crop_description = $crop_description;
		$Crop_Object->crop_category = $crop_category;
		$Crop_Object->crop_status = $crop_status;
		$Crop_Object->crop_author = $crop_author;
		$Crop_Object->meta = $meta;
		
		// Update
		return $this->Crop_Update($Crop_Object);
	}
	
	public function Catagory($id,$name,$parrent_id) {
		// Set arguments for object
		$Catagory_Object = new Catagory_();
		$Catagory_Object->id = $id;
		$Catagory_Object->name = $name;
		$Catagory_Object->parrent_id = $parrent_id;
		
		// Update
		return $this->Catagory_Update($Catagory_Object);
	}
	
	public function Files($id,$name,$url,$type_id) {
		// Set arguments for object
		$Files_Object = new Files_();
		$Files_Object->id = $id;
		$Files_Object->name = $name;
		$Files_Object->url = $url;
		$Files_Object->type_id = $type_id;
		$Files_Object->typename = '';
		
		// Update
		return $this->Files_Update($Files_Object);
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
	
	// TODO: Update article to table
	// Duc
	public function Article_Update($Article_Object) {
		$sql = "UPDATE articles SET catagory_id=$Article_Object->catagory_id,
									title=$Article_Object->title
									content=$Article_Object->content
									status=$Article_Object->status
									writter_id=$Article_Object->writter_id WHERE id=$Article_Object->id";
		if (mysqli_query($GLOBALS['DB_Conn'], $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($DB_Conn);
		    return false;
		}
		return true; // True if success, False if not
	}
	
	// TODO: Update crop catagory to table
	// Chau
	public function Crop_Cat_Update($Crop_Cat_Object) {
		$sql = "UPDATE crop_catagories SET id = $Crop_Cat_Object->$id, crop_catagory_name=$Crop_Cat_Object->$crop_category_name, crop_catagory_title = $Crop_Cat_Object->$crop_category_title, crop_catagory_parent = $Crop_Cat_Object->$crop_category_parent WHERE id=$Crop_Cat_Object->$id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result ; // True if success, False if not
	}
	
	// TODO: Update crops to table
	// Chau
	public function Crop_Update($Crop_Object) {
		$sql = "UPDATE crops SET id = $Crop_Object->$id , crop_name=$Crop_Object->$crop_name,  crop_title=$Crop_Object->$crop_title, crop_description=$Crop_Object->$crop_description, crop_catagory=$Crop_Object->$crop_category ,crop_status=	$Crop_Object->$crop_status, crop_author=$Crop_Object->$crop_author WHERE id = $Crop_Object->$id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result ; // True if success, False if not
		
		return true; // True if success, False if not
	}
	
	// TODO: Update catagory to table
	// Duy
	public function Catagory_Update($Catagory_Object) {
		$id = $Catagory_Object->id;
		$name = $Catagory_Object->name;
		$parrent_id = $Catagory_Object->parrent_id;
		
		$sql = "UPDATE catagories SET name='".$name."',parrent_id='".$parrent_id."' WHERE id='".$id."';"; // Query string
		$result = $GLOBALS['DB_Conn']->query($sql);
		return $result; // True if success, False if not
	}
	
	// TODO: Update file to table
	// Chuong
	public function Files_Update($Files_Object) {
		$sql = "UPDATE files SET name = $Files_Object->$name, url='$Files_Object->$url', type_id = $Files_Object->$type_id WHERE id=$Files_Object->$id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
	}
}

?>