<!-- 
 * THIS IS LOGIN FILE
 * AgriExtension
 * File: 	login.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->


<?php
	include("./Database/access.php");
	session_start(); // Starting Session
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			//Error
		}
		else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			// Selecting Database
			$db = mysql_select_db(DB_Name, $DB_Conn);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from users where password='$password' AND username='$username'", $db);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['username']=$username;
				//$_SESSION['roles']=Read_->;
				header("location: index.html"); // Redirecting To Other Page
			} else {
				//Error
			}
			mysql_close($connection); // Closing Connection
		}
	} else {
		echo '<div id="main">
			<h1>Login</h1>
			<div id="login">
			<h2>Login Form</h2>
			<form action="login.php" method="post">
			<label>UserName :</label>
			<input id="name" name="username" placeholder="Username" type="text">
			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password">
			<input name="submit" type="submit" value=" Login ">
			<span><?php echo $error; ?></span>
			</form>
			</div>
			</div>';
	}
?>