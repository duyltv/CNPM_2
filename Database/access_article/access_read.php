<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->
 
 
<?php
if(!isset($DB_Conn)) {
	require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'access.php';
}

class Read_Article {
	
	// TODO: Get Article_ by id
	// Duc
	public function Article($id) {
		$article = new Article_();
		$sql = "SELECT id,catagory_id, title,content,status, writter_id FROM articles WHERE $id=$Article_Object->id ";
		$result = $GLOBALS['DB_Conn']->query($sql);
		$re=mysql_fetch_array($result);
		$articles=$re[0];
		return $article;
	}
	
	// TODO: Get Article_(s) by name. Return articles have $string in $name
	// 
	public function Article_by_name($string) {
		$articles = new array(); // Article_ array
		$sql = "SELECT id,catagory_id, title,content,status, writter_id FROM articles WHERE $Article_Object->title=$string ";
		$result = $GLOBALS['DB_Conn']->query($sql);
		 while($re=mysql_fetch_array($result)){
		  $articles[] = $re[0];
		 }
		return $articles;
	}
	
	// TODO: Get Article_(s) by content. Return articles have $string in $content
	// 
	public function Article_by_content($string) {
		$articles = new array(); // Article_ array
		$sql = "SELECT id,catagory_id, title,content,status, writter_id FROM articles WHERE $Article_Object->content=$string ";
		$result = $GLOBALS['DB_Conn']->query($sql);
		 while($re=mysql_fetch_array($result)){
		  $articles[] = $re[0];
		 }
		return $articles;
	}
}
?>