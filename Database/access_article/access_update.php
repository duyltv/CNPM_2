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
class Update_Article {
	/*
	 * Interface functions
	 */
	
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
}

?>