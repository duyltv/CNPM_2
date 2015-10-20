 <!-- 
 * AgriExtension
 * File: 	saoluu.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 20 2015
 -->

<?php
	# Set html envirolment
	echo "<!DOCTYPE html>".PHP_EOL;
	echo "<html>".PHP_EOL;
	echo '<head>'.PHP_EOL;
	echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>';
	echo '<script type="text/javascript" src="progressbar.js"></script>';
	echo '<link rel="stylesheet" type="text/css" href="progressbar.css">';
	echo '<link rel="stylesheet" type="text/css" href="skins/tiny-green/progressbar.css">';
	echo '</head>'.PHP_EOL;
	echo '<meta charset="UTF-8">'.PHP_EOL;
	
	
	# Interface
	echo 'BACKUP SYSTEM<br>'.PHP_EOL;
	echo '<form action="saoluu.php" method="post">'.PHP_EOL;
	echo '<table>'.PHP_EOL.'<tr>'.PHP_EOL;
	echo '<td>'.PHP_EOL;
	echo '<input type="submit" name="bckFile" value="Backup files">'.PHP_EOL;
	echo '</td>'.PHP_EOL;
	echo '<td>'.PHP_EOL;
	echo '<input type="submit" name="bckData" value="Backup database">'.PHP_EOL;
	echo '</td>'.PHP_EOL;
	echo '/<tr>'.PHP_EOL;
	echo '<tr>'.PHP_EOL;
	
	# Process submittion
	if(isset($_POST['bckFile'])){
		echo '<div id="progressBar" class="tiny-green"><div></div></div>';
		echo '<script>';
		echo 'progressBar(75, $("#progressBar"));';
		echo '</script>';
	} else if(isset($_POST['bckData'])){
		
	}
	
	echo '</tr>'.PHP_EOL.'</table>';
	echo '</form>';
	
	echo '</html>';
?>