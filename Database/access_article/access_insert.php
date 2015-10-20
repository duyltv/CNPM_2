<!-- 
 * THIS IS EXECUTE FILE, is used to insert to database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_insert.php
 * Written: Minh Duc
 * Date: Oct 20 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}
class Insert_Article {
	/*
	 * Interface functions 2222
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
		
		// Insert
		return $this->Article_Insert($Article_Object);
	}
	
	// TODO: Insert article to table
	// Duc
	public function Article_Insert($Article_Object) {
		$sql = "SELECT id,catagory_id, title, writter_id FROM articles WHERE id =$Article_Object->id ";
		$result = $GLOBALS['DB_Conn']->query($sql);
		if ($result->num_rows > 0) 
			return false;
		else{
			$sql1 = "INSERT INTO articles(id,catagory_id,title,content	,status,writter_id)
			VALUES ($Article_Object->id,$Article_Object->catagory_id,$Article_Object->title,$Article_Object->content,$Article_Object->status,
				$Article_Object->writter_id)";

			if ($GLOBALS['DB_Conn']->query($sql1) === TRUE) {
			   	return true;
			} else {
			    return false;
			}
		}

		return true; // True if success, False if not
	}
}

?>