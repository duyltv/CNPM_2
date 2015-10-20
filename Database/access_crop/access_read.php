<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 18 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}

class Read_Crop {
	
	// TODO: Get Crop by id
	// Chau
	public function Crop($id) {
		$crop = new Crop_();
		
		$sql = "SELECT id, crop_name, crop_title, crop_description, crop_catagory, crop_status, crop_author FROM crops WHERE id='$id'";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		$row = mysql_fetch_row($result);
		
		$crop->id = $row[0];
		$crop->crop_name = $row[1];
		$crop->crop_title = row[2];
		$crop->crop_description = $row[3];
		$crop->crop_category = $row[4];
		$crop->crop_status = $row[5];
		$crop->crop_author = $row[6];
		$crop->meta = $row[7];
							
		return $result; // True if success, False if not
	}
	
	// TODO: Get Crop by string in name
	// This means if a crop has it's name includes a string, then add this crop to the array then return array.
	// Chau
	public function Crop($string) {
		$crop = new array();
		$sql = "SELECT * FROM crops WHERE crop_name LIKE '%{$needle}%'";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		if ($result->num_rows > 0)
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				$crop->id = $row[0];
				$crop->crop_name = $row[1];
				$crop->crop_title = row[2];
				$crop->crop_description = $row[3];
				$crop->crop_category = $row[4];
				$crop->crop_status = $row[5];
				$crop->crop_author = $row[6];
				$crop->meta = $row[7];
				
			}
		}
		else 
		{
			return $crop;
		}
		return $result; 
	}
	
	// TODO: Get Crop Catagory by id
	// Chau
	public function Crop_Cat($id) {
		$crop_cat = new Crop_Cat_();
				
		$sql = "SELECT id, crop_catagory_name, crop_catagory_title, crop_catagory_parent FROM crop_catagories WHERE id=.$id";
		$result = $GLOBALS['DB_Conn']->query($sql);
		
		$row = mysql_fetch_row($result);
		
		$crop_cat->id = $row[0];
		$crop_cat->crop_category_name = $row[1];
		$crop_cat->crop_category_title = row[2];
		$crop_cat->crop_category_parent = $row[3];
		
		return $result; // True if success, False if not
	}
}
?>