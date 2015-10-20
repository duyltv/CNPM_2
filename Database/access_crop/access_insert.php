<!-- 
 * THIS IS EXECUTE FILE, is used to insert to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_insert.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Insert_Crop {
	/*
	 * Interface functions 2222
	 */
	public function Crop_Cat($id,$crop_category_name,$crop_category_title,$crop_category_parent) {
		// Set arguments for object
		$Crop_Cat_Object = new Crop_Cat_();
		$Crop_Cat_Object->id = $id;
		$Crop_Cat_Object->crop_category_name = $crop_category_name;
		$Crop_Cat_Object->crop_category_title = $crop_category_title;
		$Crop_Cat_Object->crop_category_parent = $crop_category_parent;
		
		// Update
		return $this->Crop_Cat_Insert($Crop_Cat_Object);
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
		return $this->Crop_Insert($Crop_Object);
	}
	
	
	// TODO: Insert crop catagory to table
	// Chau
	public function Crop_Cat_Insert($Crop_Cat_Object) {
		
		$id = $Crop_Cat_Object->id;
		$crop_name = $Crop_Cat_Object->crop_category_name;
		$crop_title =  $Crop_Cat_Object->crop_category_title;
		$crop_category_parent = $Crop_Cat_Object->crop_category_parent;
		
		//check if insert data have the same id or not
		$sql = "SELECT id FROM crop_catagories WHERE id='$Crop_Cat_Object->id'";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		if ($result->num_rows > 0) //if the id was in existence, return False
			return false;
		else 
		{
		
			// attempt insert query execution
			$sql2 = "INSERT INTO crop_catagories VALUES (".$id.",".$crop_category_name.",".$crop_category_title.",".$crop_category_parent.")";
			$result = $GLOBALS['DB_Conn']->query($sql2);
				
				if($result) 
				{
					echo("<br>Data Input OK");
					return true; // successed
				} 
				else 
				{
					echo("<br>Data Input Failed");
					return false;//failed
				}
		}
	}
	
	// TODO: Insert crop to table
	// Chau
	public function Crop_Insert($Crop_Object) {
		
		$id = $Crop_Object->id;
		$crop_name = $Crop_Object->crop_name;
		$crop_title =  $Crop_Object->crop_title;
		$crop_description = $Crop_Object->crop_description;
		$crop_category = $Crop_Object->crop_category;
		$crop_status = $Crop_Object->crop_status;
		$crop_author = $Crop_Object->crop_author;
		$meta = $Crop_Object->meta;//?
		
		//check if insert data have the same id or not
		$sql = "SELECT id FROM crops WHERE id=$Crop_Object->id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		if ($result->num_rows > 0) //if the id was in existence, return False
			return false;
		else
		{
		
			// attempt insert query execution
			
			//// I have a question here, "$meta" is not found in the table "crops", so can you take a look at this
			$sql2 = "INSERT INTO crops VALUES (".$id.",".$crop_name.",".$crop_title.",".$crop_description.",".$crop_category.",".$crop_status.",".$crop_author.",".$meta.")";
			$result = $GLOBALS['DB_Conn']->query($sql2);
				
				if($result) 
				{
					echo("<br>Data Input OK");
					return true; // successed
				} 
				else 
				{
					echo("<br>Data Input Failed");
					return false;//failed
				}
		}
	}
}

?>