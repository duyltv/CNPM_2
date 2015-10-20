<!-- 
 * THIS IS EXECUTE FILE, is used to update to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_update.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Update_ {
	/*
	 * Interface functions
	 */
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
}

?>