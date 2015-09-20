 <!-- 
 * THIS IS CONFIGURATION FILE, INCLUDES VARIABLES ABOUT TYPES
 * AgriExtension
 * File: 	types.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->
 
 
<?php
	// For User type. Used to access user data
	class User_ { 
		public $id = '';
		public $user_name = '';  // Username
		public $user_password = '';  // Password
		public $first_name = '';  // Name that appeared on website
		public $last_name = '';
		public $banned = false; // Boolean. If this user is in banned tabble

		/* Group type
		 * Declaration: a 6 characters-size string, which each character is a binary digit. 
		 * 					+ '1' means this user has roles of the group
		 *					+ '0' means this user doesn't have roles of the group
		 *				Positions of binary digits is exactly the positions of groups ( Declared in RQ(0).txt )
		 * Example:		'100111' means this user has roles of "Nong dan", "Quan tri", 
						"Quan ly cap huyen tinh", "Khach vang lai".
		 */
		public $group = '000001'; // Default: Guess
		
		/* Role type
		 * Declaration: Get roles of this user by calculate from tables. A 23 characters-size 
						string, which each character is a binary digit. 
		 * 					+ '1' means this user has permission of this role
		 *					+ '0' means this user doesn't have permission of this role
		 *				Positions of binary digits is exactly the positions of requirements ( Declared in RQ(0).txt )
		 * Example:		'10010000111000000000000' means this user has roles: "Tim kiem giong cay trong", "Dang thong tin giong cay trong",
						"Dang khao sat", "Phe duyet bai viet ky thuat nong nghiep", "Them, sua thong tin giong cay trong"
		 */
		public $roles = '00000000000000000000111'; // Default: Guess
		
		public $meta = ''; // Default: NULL
	}
	
	class Crop_Cat {
		public $id = '';
		public $crop_category_name = '';
		public $crop_category_title = '';
		public $crop_category_parent = '';
	}
	
	// For Crop type. Used to access crops data
	class Crop {
		public $id = '';
		public $crop_name = '';
		public $crop_title = '';
		public $crop_description = '';
		public $crop_category = '';
		public $crop_status = 0;
		public $crop_author = '';
		public $meta = ''; // Default: NULL
	}
	
	// For Catagory type. Used to access catagory data
	class Catagory_ {
		public $id = '';
		public $name = '';
		public $parrent_id = ''; // Linked to Catagory.id. This is parrent's catagory's id)
	}
	
	// For Article type. Used to access article data
	class Article_ {
		public $id = '';
		public $catagory_id = ''; // Linked to Catagory.id. This article belongs to this catagory
		public $title = '';
		public $content = '';
		public $status = 0;
		public $writter_id = '';  // Linked to User.id
	}
	
	// For Files type. Used to access file data
	class Files_ {
		public $id = '';
		public $name = '';
		public $url = '';
		public $type_id = ''; // 1-png,jpg,gif,bmp; 2-doc,docx; 3-xls,xlsx;4-pdf
		public $typename = '';
	}
?>