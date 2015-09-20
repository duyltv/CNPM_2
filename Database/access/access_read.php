<!-- 
 * THIS IS EXECUTE FILE, is used to read from database. SQL is written in this file. Connection in "connect.php"
 * AgriExtension
 * File: 	access_read.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->
 
 
<?php

class Read_ {
	
	// TODO: Group type. Return a string what is user's group (Declared in types.php)
	// Duc
	static function user_group($id) {
		
		return '';
	}
	
	// TODO: Role type. Return a string what is user's role (Declared in types.php)
	// Chuong
	static function user_role($id) {
		
		return '';
	}
	
	// TODO: Get User_ by id
	// Duc
	static function User($id) {
		$user = new User_();
		
		return $user;
	}
	
	// TODO: Get User_(s) by name. Return users have $string in $name
	// Duc
	static function User_by_name($string) {
		$users = new array(); // User_ array
		
		return $users;
	}
	
	// TODO: Get Article_ by id
	// Chuong
	static function Article($id) {
		$article = new Article_();
		
		return $article;
	}
	
	// TODO: Get Article_(s) by name. Return articles have $string in $name
	// Chuong
	static function Article_by_name($string) {
		$articles = new array(); // Article_ array
		
		return $articles;
	}
	
	// TODO: Get Article_(s) by content. Return articles have $string in $content
	// Chuong
	static function Article_by_content($string) {
		$articles = new array(); // Article_ array
		
		return $articles;
	}
	
	// TODO: Get Catagory_ by id
	// Chau
	static function Catagory($id) {
		$catagory = new Catagory_();
		
		return $catagory;
	}
	
	// TODO: Get Files_ by id
	// Chau
	static function Files($id) {
		$files = new Files_();
		
		return $files;
	}
}
?>