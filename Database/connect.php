 <!-- 
 * THIS IS CONNECTION FILE, is used to connect with database
 * AgriExtension
 * File: 	connect.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->

 
<?php
// Get connecting informations
include("../config.php");

$servername = DB_Server;
$username = "root";
$password = "";
$dbname = DB_Name;

// Create connection
$DB_Conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($DB_Conn->connect_error) {
	include("../Errors/database.html");
    die("Connection failed: " . $DB_Conn->connect_error);
}

// echo "Connected successfully";
?>